<div>
    <h1>Notifications</h1>
    @foreach ($notifications as $notifications)
        <div>
            <ul>
                <li>{{ $notifications->data['message'] }}</>
            </ul>
        </div>
    @endforeach
</div>