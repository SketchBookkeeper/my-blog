<div class="c-post-card">
    <div class="c-post-card__tags"></div>

    <a href="/posts/{{ $slug }}" class="c-post-card__body">
        <h2 class="c-post-card__title">{{ $title }}</h2>

        <p class="c-post-card__date">{{ $date }}</p>

        <p class="c-post-card__excerpt">{{ $slot }}</p>
    </a>
</div>
