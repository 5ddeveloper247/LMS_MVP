<article class="ce-elective-card {{ ! empty($elective['featured']) ? 'featured' : '' }}">
    <span class="ce-elective-category">{{ $elective['category'] }}</span>
    <h3>{{ $elective['title'] }}</h3>
    <p>{{ $elective['description'] }}</p>
    <div class="ce-elective-footer">
        <span>{{ $elective['hours'] }}</span>
        <strong>{{ $elective['price'] }}</strong>
    </div>
</article>
