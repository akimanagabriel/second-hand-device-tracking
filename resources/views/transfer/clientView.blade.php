@php
    use App\Models\Device;
    use App\Models\Transfer;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
@endphp



@if (count($transfers) == 0)
    <div class="alert alert-info col">No tranfer record available right now</div>
@else
    <h4 class="mb-3 col-md-12">Transfer history</h4>
    @foreach ($transfers as $transfer)
        @php
            $sender = User::find($transfer->sender);
            $receiver = User::find($transfer->receiver);
            $device = Device::find($transfer->device);
            
            $isReceiver = $transfer->receiver == Auth::user()->id;
            $isSender = $transfer->sender == Auth::user()->id;
        @endphp

        <div class="col-md-4   mb-4 rounded stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{ $transfer->created_at->format('l, F Y') }}
                            </h4>
                            <h6 class="mb-0">
                                @if ($isSender)
                                    <span class="text-danger">
                                        You transmited
                                        {{ $device->brand }}-{{ $device->name }}
                                        to {{ $receiver->firstname }} {{ $receiver->lastname }}
                                    </span>
                                @else
                                    <span class="text-success">
                                        You Received
                                        {{ $device->brand }}-{{ $device->name }}
                                        from {{ $sender->firstname }} {{ $sender->lastname }}
                                    </span>
                                @endif
                            </h6>
                            <p class="text-muted">{{ $transfer->created_at->diffForHumans() }}</p>

                            <strong
                                class="card-description text-info">{{ $isReceiver ? 'Sender Details' : 'Receiver Details' }}</strong>
                            <div>
                                <p><strong>Names:
                                    </strong>{{ $isSender ? $receiver->firstname . ' ' . $receiver->lastname : $sender->firstname . ' ' . $sender->lastname }}
                                </p>
                                <p><strong>Phone number: </strong>{{ $isSender ? $receiver->phone : $sender->phone }}
                                </p>
                                <p><strong>Email: </strong>{{ $isSender ? $receiver->email : $sender->email }}</p>
                                <p><strong>Joined since: </strong>{{ $isSender ? $receiver->created_at->diffForHumans() : $sender->created_at->diffForHumans() }}</p>

                            </div>
                        </div>
                        {{-- <div>
                            <a class="btn btn-primary" href="{{ route('device.index') }}">
                                My Devices
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-12">
        {{ $transfers->links() }}
    </div>
@endif
