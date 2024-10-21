@if($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p class="font-bold">{{ __(key: 'validation.correct_errors') }}:</p>
        <ul class="list-disc list-inside">
            @foreach ($errors->getMessages() as $field => $messages)
                <li>
                    @foreach($messages as $message)
                        <span>{{ $message }}</span>
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
@endif
