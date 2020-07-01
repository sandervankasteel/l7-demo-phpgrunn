<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div id="map-responsive">
                <iframe src="https://www.google.com/maps/embed/v1/place?key={{ $apiKey }}&q={!! $address->latitude() !!},{!! $address->longitude() !!}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-4">
            <h4>Full address details</h4>
            {{ $address->addressLineOne() }} <br />
            {{ $address->addressLineTwo() }}
            {{ $address->country() }}
        </div>
    </div>
</div>

