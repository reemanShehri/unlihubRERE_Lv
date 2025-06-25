

@extends('admin.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="my-4 text-center"><i class="fas fa-bell"></i> Notifications</h1>
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-list"></i> All Notifications
            </div>
            <div class="card-body">
                @if(Auth::user()->notifications->isEmpty())
                    <p class="text-muted text-center"><i class="fas fa-info-circle"></i> You have no notifications.</p>
                @else
                    <ul class="list-group">
                        @foreach(Auth::user()->notifications as $notification)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><i class="fas fa-envelope"></i> {{ $notification->data['title'] ?? 'Notification' }}</strong>
                                    <p class="mb-0">{{ $notification->data['message'] ?? '' }}</p>
                                    <small class="text-muted"><i class="fas fa-clock"></i> {{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                @if(is_null($notification->read_at))
                                    <form action="{{ route('admin.notifications.markAsRead', $notification->id) }}" method="POST" class="ms-3">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fas fa-check"></i> Mark as Read
                                        </button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
