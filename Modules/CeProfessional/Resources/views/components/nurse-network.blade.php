<section class="ce-section ce-network-section">
    @include('ceprofessional::components.section-header', [
        'title' => 'Licensed Nurse Network',
        'link' => '#',
        'linkLabel' => 'View Full Community →',
    ])

    <div class="ce-network-grid">
        <article class="ce-network-card ce-network-regulatory">
            <span class="ce-network-tag">{{ $nurse_network['regulatory']['category'] }}</span>
            <h3>{{ $nurse_network['regulatory']['title'] }}</h3>
            <p>{{ $nurse_network['regulatory']['excerpt'] }}</p>
            <div class="ce-network-meta">
                <span>Posted by {{ $nurse_network['regulatory']['author'] }}</span>
                <span>{{ $nurse_network['regulatory']['replies'] }} replies</span>
            </div>
        </article>

        @foreach ($nurse_network['posts'] as $post)
            <article class="ce-network-card ce-network-post">
                <div class="ce-network-post-head">
                    <div class="ce-network-avatar">{{ $post['initials'] }}</div>
                    <div>
                        <strong>{{ $post['name'] }}</strong>
                        <span>{{ $post['time'] }}</span>
                    </div>
                </div>
                <p>{{ $post['body'] }}</p>
                <div class="ce-network-meta">
                    <span>{{ $post['replies'] }} replies</span>
                    <span class="ce-network-pill">{{ $post['tag'] }}</span>
                </div>
            </article>
        @endforeach

        <article class="ce-network-card ce-network-mentorship">
            <span class="ce-network-tag accent">{{ $nurse_network['mentorship']['category'] }}</span>
            <h3>{{ $nurse_network['mentorship']['title'] }}</h3>
            <p>{{ $nurse_network['mentorship']['description'] }}</p>
            <span class="ce-network-cta">{{ $nurse_network['mentorship']['cta'] }}</span>
        </article>
    </div>
</section>
