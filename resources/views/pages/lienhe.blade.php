@extends('layout.index')
@section('content')

<div id="mainBody">
    <div class="container">
        <hr class="soften">
        <h1>Công ty Cổ Phần Shop Hoa</h1>
        <hr class="soften"/>
        <div class="row">
            <div class="span4">
                <h4>Địa chỉ shop hoa:</h4>
                <p>	18 Ninh Kiều,<br/> Cần Thơ, Việt Nam
                    <br/><br/>
                    abc@shop.com<br/>
                    ﻿Tel 123-456-6780<br/>
                    Fax 123-456-5679<br/>
                    web:shop.com
                </p>
            </div>

            <div class="span4">
                <h4>Mở Cửa</h4>
                <h5> Thứ 2 - Thứ 7</h5>
                <p>07:00am - 09:00pm<br/><br/></p>
                <h5>Thứ bảy</h5>
                <p>09:00am - 07:00pm<br/><br/></p>
                <h5>Chủ Nhật</h5>
                <p>12:30pm - 06:00pm<br/><br/></p>
            </div>
            <div class="span4">
                <h4>Địa chỉ Email</h4>
                <form class="form-horizontal">
                    <fieldset>
                        <div class="control-group">

                            <input type="text" placeholder="name" class="input-xlarge"/>

                        </div>
                        <div class="control-group">

                            <input type="text" placeholder="email" class="input-xlarge"/>

                        </div>
                        <div class="control-group">

                            <input type="text" placeholder="subject" class="input-xlarge"/>

                        </div>
                        <div class="control-group">
                            <textarea rows="3" id="textarea" class="input-xlarge"></textarea>

                        </div>

                        <button class="btn btn-large" type="submit">Gữi Mail</button>

                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+C%E1%BA%A7n+Th%C6%A1/@10.0296404,105.7684098,16.5z/data=!4m8!1m2!7m1!2e1!3m4!1s0x31a0883d0dac6b15:0xf6ae5b1bd18625!8m2!3d10.0309646!4d105.7689039" ><img src="upload/slider/map.JPG" /></a>

            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
@endsection('content')