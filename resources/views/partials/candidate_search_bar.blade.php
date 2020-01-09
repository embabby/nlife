<div class="col-md-12">
    <div  id="searchBar">
        <div class="container">
            <div class="row">
                @if(Auth::guard('candidate')->check())
                <form action="{{url('/candidate/search')}}" >
                    @else
                    <form action="{{url('/candidate/guestsearch')}}" >
                    @endif

                    <div class="col-lg-9 col-lg-offset-1">
                        <div class="search-bar">
                            <div class="col-lg-10">
                                <input class="job" type="text" id="input1" name="input" placeholder=" &#xf0b1; Job Title , Keywords ,or Company">
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-success  search1"><i class="fa fa-search "></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


