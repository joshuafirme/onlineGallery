@extends('layouts.adminbase')

@section('title')
    Website Title | Messages
@endsection

@section('content')
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Messages</h3>
                </div>
                <table class="table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $messages)
                            <tr>
                                <td>{{ $messages->id }}.)</td>
                                <td>{{ Str::limit($messages->message, 30) }}</td>
                                <td>{{ \Carbon\Carbon::parse($messages->created_at)->format('F j, Y') }}</td>
                                <!-- Button to trigger the modal -->
                                <td>
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#exampleModal{{ $messages->id }}">
                                        View <i class="bi bi-chat-left-dots"></i> 
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $messages->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Message #{{ $messages->id }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="white-space: pre-line">
                                                {{ $messages->message }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <td>
                                    <form method="POST" action="{{ route('delete-message', $messages->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            DELETE <i class="bi bi-trash"></i> 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
@endsection
