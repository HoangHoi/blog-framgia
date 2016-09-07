<ul class="list-group">
    @foreach($objCategories as $category)
    <a href="{!! route('category.show', $category->id) !!}"><li class="list-group-item"><span class="badge">{!! $category->entriesPublished()->get()->count() !!}</span> {!! $category->content !!}</li></a>
    @endforeach
</ul>
