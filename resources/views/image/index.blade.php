<h1>All Image</h1>

@foreach ($images as $image)
    <div>
        <a href="{{ $image->permalink() }}">
            <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300">  
        </a>
    </div>
@endforeach 