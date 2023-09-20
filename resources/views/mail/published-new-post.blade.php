<x-mail::message>

Hello

The following new post has been published in {{ env('APP_NAME') }}.

{{ $post->title }}

<x-mail::button :url="{{ $post->link() }}">
Give a read now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
