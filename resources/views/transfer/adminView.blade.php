@php
    use App\Models\Device;
    use App\Models\Transfer;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
@endphp



@if (count($transfers) == 0)
    <div class="alert alert-info col">No tranfer record available right now</div>
@else
    <h4 class="mb-3 col-md-12">Transfers</h4>
    @foreach ($transfers as $transfer)
        @php
            $sender = User::find($transfer->sender);
            $receiver = User::find($transfer->receiver);
            $device = Device::find($transfer->device);
        @endphp

        <div class="col-lg-6   mb-4 rounded stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4>{{ $transfer->created_at->format('l, F Y') }}</h4>
                        <p class="text-muted mb-3">{{ $transfer->created_at->diffForHumans() }}</p>

                        <p class="mb-0">
                            <span>
                                {{ $sender->firstname }} {{ $sender->lastname }}
                                exchanges
                                {{ $device->brand }}-{{ $device->name }}
                                with {{ $receiver->firstname }} {{ $receiver->lastname }}
                            </span>
                        </p>
                        <p class="mt-2">
                            Device Name: <strong class="text-info">{{ Str::upper($device->name) }}</strong><br>
                            Device Serialnumber: <strong class="text-info">{{ Str::upper($device->sn) }}</strong><br>
                            Device Brand: <strong class="text-info">{{ Str::upper($device->brand) }}</strong>
                        </p>
                    </div>

                    <div class="mt-4 d-flex justify-content-between align-items-center">

                        <div class="">
                            <h5>Receiver</h5>
                            <p>
                                <strong>Names: </strong>
                                {{ $receiver->firstname . ' ' . $receiver->lastname }}
                            </p>
                            <p>
                                <strong>Phone number: </strong>
                                {{ $receiver->phone }}
                            </p>
                            <p>
                                <strong>Email: </strong>
                                {{ $receiver->email }}
                            </p>
                            <p>
                                <strong>National id: </strong>
                                {{ $receiver->nid }}
                            </p>
                            <p>
                                <strong>Joined since: </strong>
                                {{ $receiver->created_at->diffForHumans() }}
                            </p>
                        </div>

                        <div class="">
                            <h5>Sender</h5>
                            <p>
                                <strong>Names: </strong>
                                {{ $sender->firstname . ' ' . $sender->lastname }}
                            </p>
                            <p>
                                <strong>Phone number: </strong>
                                {{ $sender->phone }}
                            </p>
                            <p>
                                <strong>Email: </strong>
                                {{ $sender->email }}
                            </p>
                            <p>
                                <strong>National Id: </strong>
                                {{ $sender->nid }}
                            </p>
                            <p>
                                <strong>Joined since: </strong>
                                {{ $sender->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-12">
        {{ $transfers->links() }}
    </div>
@endif
