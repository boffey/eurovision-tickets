<!doctype html>
<html>
    <head>
        <title>Eurovision Alert</title>
    </head>
    <body>

        <h1>New Eurovision Stories</h1>

        @foreach($stories as $story)
            <a href="{{ $story->getUrl() }}" title="{{ $story->getTitle() }}">{{ $story->getTitle() }} - <small>{{ $story->getDate()->format('d/m/Y H:i:s') }}</small></a><br />
        @endforeach

    </body>
</html>