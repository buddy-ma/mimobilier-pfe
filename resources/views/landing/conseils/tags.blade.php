<div class="articlesHub__menu">
    <div class="articlesHub__menu__container text-center">
        <div class="articlesHub__menu__content">
            <a class="articlesHub__menu__item selected"><i class="fa fa-home"></i>
                <span class="caretForSmallMenu"><i class="fa fa-caret-down"></i></span>
            </a>
            @foreach ($categoryConseils as $categoryConseil)
                <a data-slug="{{ $categoryConseil->id }}" class="articlesHub__menu__item">{{ $categoryConseil->title }}
                    <span class="caretForSmallMenu"><i class="fa fa-caret-down"></i></span>
                </a>
            @endforeach
            <div class="articlesHub__menu__content-border"></div>
        </div>
    </div>
</div>
