<?php

namespace Tests\Feature;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TransactionIsolationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Application::factory()->create([
            'id'            => 99,
            'name'          => 'Test Application',
            'email'         => 'test@test.com',
            'phone'         => '380123456789',
            'message'       => 'mess',
            'ip_address'    => '127.0.0.1',
        ]);
    }

    /**
     *  @test
     *  Грязное чтение (READ UNCOMMITTED): Тест проверяет, видит ли одна транзакция изменения, сделанные другой, но еще не зафиксированные.
     */
    public function it_allows_dirty_read_with_read_uncommitted(): void
    {
        DB::beginTransaction();
        DB::table('max_applications')->where(column: 'id', operator: 99)->update(values: ['email' => 'changed@test.com']);

        DB::statement('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
        $email = DB::table('max_applications')
            ->where(column:'id', operator: 99)
            ->value(column:'email');

        $this->assertEquals('changed@test.com', $email);
        DB::rollBack();
    }

    /**
     *  @test
     *  Неповторяющееся чтение (READ COMMITTED): Проверяется, что результат чтения может измениться при повторном запросе, если другая транзакция обновила данные.
     */
    public function it_prevents_non_repeatable_read_with_read_committed(): void
    {
        DB::statement('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
        DB::beginTransaction();

        $email_1 = DB::table('max_applications')
            ->where(column: 'id', operator: 99)
            ->value(column: 'email');

        DB::table('max_applications')
            ->where(column: 'id', operator: 99)
            ->update(values: ['email' => 'changed_mail@test.com']);

        $email_2 = DB::table('max_applications')
            ->where(column: 'id', operator: 99)
            ->value(column: 'email');

        DB::commit();

        $this->assertNotEquals($email_1, $email_2);
    }

    /**
     * @test
     * Фантомное чтение (REPEATABLE READ): Тест проверяет, что новые строки, добавленные в параллельной транзакции, не видны.
     */
    public function it_prevents_phantom_read_with_repeatable_read()
    {
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
        DB::beginTransaction();

        $count1 = DB::table('users')->count();

        User::factory()->create(); // Создаем еще одного пользователя параллельно

        $count2 = DB::table('users')->count();
        DB::commit();

        $this->assertEquals($count1, $count2);
    }

    /**
     * @test
     * Сериализуемая изоляция (SERIALIZABLE): Проверяет, что при максимальном уровне изоляции транзакции исполняются последовательно, избегая всех возможных аномалий.
     */
    public function it_prevents_all_anomalies_with_serializable()
    {
        DB::statement('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');
        DB::beginTransaction();

        $balance1 = DB::table('users')->where('id', 1)->value('balance');

        DB::table('users')->where('id', 1)->update(['balance' => $balance1 + 100]);

        DB::commit();

        $balance2 = DB::table('users')->where('id', 1)->value('balance');
        $this->assertEquals($balance1 + 100, $balance2);
    }
}
