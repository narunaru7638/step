<div class="l-sidebar l-sidebar--left">
    <div class="l-sidebar__container">
        <h2 class="l-sidebar__title">WHATS NEW</h2>
        <h3 class="l-sidebar__sub-title">最新情報</h3>
        <div class="l-sidebar__content">
            @foreach($steps_new as $key=>$step_new)
                @if( $key <= 4 )

                    <div class="c-article-list c-article-list--small">
                        <icon class="c-article-list__icon c-article-list__icon-small">NEW</icon>
                        <a class="c-article-list__img c-article-list__img--small" href="{{ route('steps.detail', ['id' => $step_new->getId()]) }}"><img src="/storage/{{ $step_new->getPicImg() }}" alt=""></a>

                        <div class="c-article-list__content c-article-list__content--small">
                            <div class="c-article-list__info c-article-list__info--small">
                                <p class="c-article-list__category c-article-list__category--small">{{ $step_new->getCategoryName() }}</p>

                                <p class="c-article-list__username c-article-list__username--small">{{ $step_new->getUserName() }}</p>
                                <p class="c-article-list__date c-article-list__date--small">{{ $step_new->getCreatedAt() }}</p>
                            </div>
                            <a href="{{ route('steps.detail', ['id' => $step_new->getId()]) }}"><p class="c-article-list__title c-article-list__title--small">{{ $step_new->getTitle() }}</p></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="l-sidebar__container">
        <h2 class="l-sidebar__title">RANKING</h2>
        <h3 class="l-sidebar__sub-title">人気のSTEP</h3>
        <div class="l-sidebar__content">
            @foreach($steps_rank as $key=>$step_rank)
                @if( $key <= 4 )
                    <div class="c-article-list c-article-list--small">
                        <icon class="c-article-list__icon c-article-list__icon--small">{{ $key+1 }}</icon>
                        <a href="{{ route('steps.detail', ['id' => $step_rank->getId()]) }}" class="c-article-list__img c-article-list__img--small"><img src="/storage/{{ $step_rank->getPicImg() }}" alt=""></a>
                        <div class="c-article-list__content c-article-list__content--small">
                            <div class="c-article-list__info c-article-list__info--small">
                                <p class="c-article-list__category c-article-list__category--small">{{ $step_rank->getCategoryName() }}</p>
                                <p class="c-article-list__username c-article-list__username--small">{{ $step_rank->getUserName() }}</p>
                                <p class="c-article-list__date c-article-list__date--small">{{ $step_rank->getCreatedAt() }}</p>
                            </div>
                            <a href="{{ route('steps.detail', ['id' => $step_rank->getId()]) }}"><p class="c-article-list__title c-article-list__title--small">{{ $step_rank->getTitle() }}</p></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


</div>