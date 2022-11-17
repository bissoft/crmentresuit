@if($message->request_id)
    @php $request = $message->request; @endphp
    <div class="card offer-here mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold">New Request</h6>
            <h5 class="font-weight-bold">${{ $request->price }}</h5>
        </div>
        <div class="card-body">
            <p>{{ $request->requirements }}</p>
            <hr>
            <div>
            <h6 class="text-dark font-weight-bold mb-2">Your offer includes</h6>
             <p>{!! $message->text !!}</p>
             </div>
             <hr>
             <div class="text-right">
                @if(auth()->user()->id == $request->customer_id)
                    @if($request->status == 'accepted')
    
                        <a href="{{ url('order-summary', $message->request->id) }}" class="btn btn-success">Pay Now</a>
                        <!--<a href="{{ route('customer.review.request', $message->request->id) }}" class="btn btn-primary">Offer Accepted</a>-->
                    @else
                        <a href="#" class="btn btn-primary text-capitalize">Order {{ $request->status }}</a>
                    @endif
                @elseif(auth()->user()->id == $request->athlete_id)
                    @if($request->status == 'pending')
                        <a href="{{ url('accept-request', $message->request->id) }}" class="btn btn-primary ">Accept Offer</a>
                    @else
                        <a href="#" class="btn btn-primary text-capitalize">Order {{ $request->status }}</a>
                    @endif
                @endif
             </div>
        </div>
    </div>
@elseif($message->sender)
    @if ($message->sender->id === auth()->user()->id)
    <div class="media text-group me">
        <img class="mr-3" src="{{ $message->sender->picture ?? '/dash-assets/images/user/user10.jpg' }}" alt=" image">
        <div class="media-body">
            <h5 class="mt-0">{{ $message->sender->id == 1 ? config('app.name') . ' Support' : $message->sender->first_name . ' ' . $message->sender->last_name  }} <small>{{ $message->created_at }}</small></h5>
            <p>{!! $message->text !!}</p>
        </div>
    </div>
    @else
    <div class="media">
        <img class="mr-3" src="{{ $message->sender->picture ?? '/dash-assets/images/user/user9.jpg' }}" alt=" image">
        <div class="media-body">
            <h5 class="mt-0">{{ $message->sender->id == 1 ? config('app.name') . ' Support' : $message->sender->first_name . ' ' . $message->sender->last_name  }} <small>{{ $message->created_at }}</small></h5>
            <p>{!! $message->text !!}</p>
        </div>
    </div>
    @endif
    @if ($loop->last)
    <div class="animateHere"></div>
    @endif
@endif