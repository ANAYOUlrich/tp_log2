                @if(Session::has('error'))
                    <div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <p>{!!Session::get('error')!!}</p>
                    </div>
                @elseif(Session::has('success'))
                    <div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <p>{!!Session::get('success')!!}</p>
                    </div>
                @endif