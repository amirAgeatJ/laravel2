<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
    <p><strong>{{ $review->user->name }}</strong> a noté ce livre {{ $review->rating }}/5</p>
    <p>{{ $review->content }}</p>
    <small>Posté le {{ $review->created_at->format('d/m/Y à H:i') }}</small>
</div>
