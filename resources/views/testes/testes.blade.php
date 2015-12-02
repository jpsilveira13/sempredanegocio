@extends('site.layout')

@section('content')
    <br/><br/>
    <div class="row">
        <div class="colummns large-12">
            <div class="row">
                <div class="large-4 columns">
                    <h4>Image Gallery</h4>
                    <br/>
                    <ul id="photos_clearing" class="clearing-thumbs" data-clearing>
                    </ul>
                    <br/>
                    <label for='photos'>Add some pics?:</label>
                    <input type="file" id="photos" name="photos[]" multiple/>
                </div>
            </div>
        </div>
    </div>



@endsection