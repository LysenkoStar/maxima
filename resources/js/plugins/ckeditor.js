import { ClassicEditor as ClassicEditorBase } from '@ckeditor/ckeditor5-editor-classic';
import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import { Bold, Italic } from '@ckeditor/ckeditor5-basic-styles';
import { BlockQuote } from '@ckeditor/ckeditor5-block-quote';
import { Heading } from '@ckeditor/ckeditor5-heading';
import { Link, LinkImage } from '@ckeditor/ckeditor5-link';
import { List } from '@ckeditor/ckeditor5-list';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';
import { Font } from '@ckeditor/ckeditor5-font';
import { Alignment } from '@ckeditor/ckeditor5-alignment';
import { SimpleUploadAdapter } from '@ckeditor/ckeditor5-upload';
import { Table, TableToolbar, TableCellProperties, TableProperties } from '@ckeditor/ckeditor5-table';
import { HtmlEmbed } from '@ckeditor/ckeditor5-html-embed';
import { SpecialCharacters, SpecialCharactersEssentials } from '@ckeditor/ckeditor5-special-characters';
import { HorizontalLine } from '@ckeditor/ckeditor5-horizontal-line';
import { SourceEditing } from '@ckeditor/ckeditor5-source-editing';
import {
    Image,
    ImageCaption,
    ImageInsert,
    ImageResize,
    ImageStyle,
    ImageToolbar,
    ImageUpload
} from '@ckeditor/ckeditor5-image';
import DOMPurify from 'dompurify';

export default class ClassicEditor extends ClassicEditorBase {}

ClassicEditor.builtinPlugins = [
    Essentials,
    Autoformat,
    Bold,
    Italic,
    BlockQuote,
    Heading,
    Link,
    List,
    Paragraph,
    Font,
    Alignment,
    Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, ImageUpload, ImageInsert,
    SimpleUploadAdapter,
    Table, TableToolbar, TableCellProperties, TableProperties,
    HtmlEmbed,
    SpecialCharacters, SpecialCharactersEssentials,
    HorizontalLine,
    SourceEditing
];

ClassicEditor.defaultConfig = {
    toolbar: {
        items: [
            'undo',
            'redo',
            '|',
            'heading',
            '|',
            'bold',
            'italic',
            'fontFamily',
            'fontSize',
            'blockQuote',
            'alignment',
            '|',
            'link',
            'insertImage',
            '|',
            'bulletedList',
            'numberedList',
            'insertTable',
            'htmlEmbed',
            'specialCharacters',
            'horizontalLine',
            'sourceEditing'
        ]
    },
    htmlEmbed: {
        showPreviews: true,
        sanitizeHtml: ( inputHtml ) => {
            const outputHtml = DOMPurify.sanitize( inputHtml );

            return {
                html: outputHtml,
                // true or false depending on whether the sanitizer stripped anything.
                hasChanged: true
            };
        }
    },
    table: {
        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties' ],
        tableProperties: {},
        tableCellProperties: {}
    },
    image: {
        toolbar: [
            'imageStyle:block',
            'imageStyle:side',
            '|',
            'toggleImageCaption',
            'imageTextAlternative',
            '|',
            'linkImage'
        ],
        insert: {
            integrations: [ 'upload', 'url' ],
            type: 'auto'
        },
        upload: [ 'jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff' ],
    },
    simpleUpload: {
        uploadUrl: window.location.origin + '/ckeditor/media/upload',
        withCredentials: true,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    alignment: {
        options: [ 'left', 'right' ]
    },
    fontSize: {
        options: [
            9,
            11,
            13,
            'default',
            17,
            19,
            21
        ]
    },
    fontFamily: {
        options: [
            'default',
            'Open Sans, sans-serif',
            'Open Sans Semi Bold, sans-serif',
            'Montserrat',
            'Montserrat Medium',
            'Montserrat Semi Bold',
            'Montserrat Bold',
        ]
    },
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        ]
    },
    htmlSupport: {
        allow: [
            {
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }
        ]
    },
    removePlugins: [
        'AIAssistant',
        'CKBox',
        'CKFinder',
        'EasyImage',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        'MathType',
        'SlashCommand',
        'Template',
        'DocumentOutline',
        'FormatPainter',
        'TableOfContents',
        'PasteFromOfficeEnhanced',
        'CaseChange',
    ],
    language: 'en'
};

// 'findAndReplace', 'selectAll', '|',
//     'heading', '|',
//     'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
//     'bulletedList', 'numberedList', 'todoList', '|',
//     'outdent', 'indent', '|',
//     'undo', 'redo',
//     '-',
//     'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
//     'alignment', '|',
//     'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
//     'specialCharacters', 'horizontalLine', 'pageBreak', '|',
//     'textPartLanguage', '|',
//     'sourceEditing'
