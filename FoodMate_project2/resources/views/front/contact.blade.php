@extends('front.layout.master')
@section('title', 'FootMate - Contact Us')
@section('body')
  <section>
    <div class="bread-crumbs-wrapper">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" title="" itemprop="url">Home</a></li>
          <li class="breadcrumb-item active">Contact Us</li>
        </ol>
      </div>
    </div>
  </section>

  <section>
    <div class="block less-spacing gray-bg top-padd30">

      <div class="container">
        <div class="row">

          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="sec-box">
              <div class="loc-map" id="loc-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d465.5125370069974!2d105.78239491149515!3d21.028672542702772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455f9bdf0e1c7%3A0x26caee8e7662dd9b!2zRlBUIEFwdGVjaCBIw6AgTuG7mWk!5e0!3m2!1svi!2sus!4v1612012955939!5m2!1svi!2sus" width="100%" height="500px" frameborder ="1" style="border:0;" allowfullscreen="" ></iframe>
              </div>
              <div class="contact-info-sec text-center">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="contact-info-box">
                      <i class="fa fa-phone-square"></i>
                      <h5 itemprop="headline">PHONE</h5>
                      <p itemprop="description">Phone 01: 033937165</p>
                      <p itemprop="description">Phone 02: 094716385</p>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="contact-info-box">
                      <i class="fa fa-map-marker"></i>
                      <h5 itemprop="headline">ADDRESS</h5>
                      <p itemprop="description">No. 08, Ton That Thuyet Street, My Dinh Ward, Tu Liem District, Hanoi City.</p>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="contact-info-box">
                      <i class="fa fa-envelope"></i>
                      <h5 itemprop="headline">EMAIL</h5>
                      <p itemprop="description"><a href="mailto:supportfoodmate@gmail.com">support@foodmate.com</a></p>
                      <p itemprop="description"><a href="mailto:hellofoodmate@gmail.com">hellofoodmate@gmail.com</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="contact-form-wrapper text-center">
                <div class="contact-form-inner">
                  <h3 itemprop="headline">If You Got Any Questions <br> Please Do Not Hesitate to Send us a Message.</h3>
                  <div id="message"></div>
                  <form method="post" action="/contact-us" id="contactform">
                      @csrf
                    <div class="row">
                      <div class="col-md-12 col-sm-6 col-lg-12">
                        <input id="name" type="text" placeholder="Your Name" required>
                      </div>
                      <div class="col-md-12 col-sm-6 col-lg-12">
                        <input id="email" type="email" placeholder="Your Email" required>
                      </div>
                      <div class="col-md-12 col-sm-12 col-lg-12">
                        <input type="text" placeholder="Subject" required>
                      </div>
                      <div class="col-md-12 col-sm-12 col-lg-12">
                        <textarea id="comments" placeholder="Message" required></textarea>
                      </div>
                      <!--<div class="col-md-12 col-sm-12 col-lg-12">
                          <div class="g-recaptcha" data-sitekey="6LelmzAUAAAAAHBE2SJeRMfnzYVxH9RMGQstUij2"></div>
                      </div>-->
                      <div class="col-md-12 col-sm-12 col-lg-12">
                        <button class="brd-rd2" id="submit" type="submit">SEND MESSAGE</button>
                        <img src="assets/images/ajax-loader.gif" class="loader" alt="ajax-loader.gif" itemprop="image">
                      </div>
                    </div>
                  </form>
                </div>
              </div><!-- Contact Form Wrapper -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
