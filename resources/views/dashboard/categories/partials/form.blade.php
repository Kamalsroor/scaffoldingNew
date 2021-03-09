@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

@isset($category)
    {{ BsForm::image('image')->files($category->getMediaResource()) }}
@else
    {{ BsForm::image('image') }}
@endisset

