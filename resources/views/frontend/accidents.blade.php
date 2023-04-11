@extends('frontend.main_master')

@section('content')

<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Accident Management Services</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/sale-motercycles">Sales</a></li>
                        <li><a href="/accidents">Accident Management Services</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<section class="flat-row flat-iconbox">
    <div class="container">
        <div class="title-section">
            <h3>Make a claim today</h3>
            <p>We are driven to keeping you moving.</p>
        </div>
        <div class="row align-items-start">
            <div class="col">
                <div class="featured-post">
                    <img src="https://mc-ams.co.uk/wp-content/themes/mcams/assets/img/mcams-team-alt.webp" alt="image" loading="lazy">
                </div>

                <div class="entry-post">
                    <p>When you’re involved in a motorcycle accident, the last thing you want is any more hassle.</p>
                    <p>Fortunately, our expert advisors are here to help.</p>
                    <p>Please complete our simple form and our helpful team will be in touch.</p>
                    <p>If you’d prefer to pick up the phone, please call our claims hotline at any time on <a href="tel:03450541000" class="font-bold">0345 054 1000</a>.</p>
                </div>
                <div>
                    <strong>We are available 24/7 365 days a year</strong>
                </div>
            </div>
            <div class="col">
                <form method="post" enctype="multipart/form-data" target="" id="" action="">
                    <div class="form-text-wrap clearfix">
                        <div class="your-name clearfix">
                            <label>Your Name</label>
                            <input type="text" aria-required="true" size="30" value="" name="author" id="author">
                        </div>
                        <div class="your-phone-number clearfix">
                            <label>Your Phone Number</label>
                            <input type="text" aria-required="true" size="30" value="" name="author" id="author">
                        </div>
                        <div class="phone-email clearfix">
                            <label>Your Email (optional)</label>
                            <input type="text" aria-required="true" size="30" value="" name="author" id="author">
                        </div>
                    </div>

                    <div id="field_6_6" class="gfield gfield--type-select gfield_contains_required field_sublabel_above gfield--no-description field_description_below gfield_visibility_visible" data-js-reload="field_6_6"><label class='gfield_label gform-field-label' for='input_6_6'>Language Preference<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></label>
                        <div class='ginput_container ginput_container_select'><select name='input_6' id='input_6_6' class='large gfield_select' aria-required="true" aria-invalid="false">
                                <option value='English'>English</option>
                                <option value='Arabic'>Arabic</option>
                                <option value='Bengali'>Bengali</option>
                                <option value='French'>French</option>
                                <option value='Panjabi'>Panjabi</option>
                                <option value='Polish'>Polish</option>
                                <option value='Portuguese'>Portuguese</option>
                                <option value='Spanish'>Spanish</option>
                            </select></div>
                    </div>
                    <div id="field_6_7" class="gfield gfield--type-select gfield_contains_required field_sublabel_above gfield--no-description field_description_below gfield_visibility_visible" data-js-reload="field_6_7"><label class='gfield_label gform-field-label' for='input_6_7'>Relevant Vehicle Type<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></label>
                        <div class='ginput_container ginput_container_select'><select name='input_7' id='input_6_7' class='large gfield_select' aria-required="true" aria-invalid="false">
                                <option value='Van'>Van</option>
                                <option value='Car'>Car</option>
                                <option value='Bicycle'>Bicycle</option>
                                <option value='Motorcycle' selected='selected'>Motorcycle</option>
                            </select></div>
                    </div>
                    <div id="field_6_8" class="gfield gfield--type-text gfield_contains_required field_sublabel_above gfield--no-description field_description_below gfield_visibility_visible" data-js-reload="field_6_8"><label class='gfield_label gform-field-label' for='input_6_8'>Where did you hear about us?<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></label>
                        <div class='ginput_container ginput_container_text'><input name='input_8' id='input_6_8' type='text' value='' class='large' aria-required="true" aria-invalid="false" /> </div>
                    </div>
                    <fieldset id="field_6_9" class="gfield gfield--type-consent gfield--type-choice gfield--width-full gfield_contains_required field_sublabel_above gfield--no-description field_description_below gfield_visibility_visible" data-js-reload="field_6_9">
                        <legend class='gfield_label gform-field-label gfield_label_before_complex'>Consent<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>
                        <div class='ginput_container ginput_container_consent'><input name='input_9.1' id='input_6_9_1' type='checkbox' value='1' aria-required="true" aria-invalid="false" /> <label class="gform-field-label gform-field-label--type-inline gfield_consent_label" for='input_6_9_1'>By submitting this form you agree to our <a href="/privacy-policy/">privacy policy</a>.</label><input type='hidden' name='input_9.2' value='By submitting this form you agree to our &lt;a href=&quot;/privacy-policy/&quot;&gt;privacy policy&lt;/a&gt;.' class='gform_hidden' /><input type='hidden' name='input_9.3' value='6' class='gform_hidden' /></div>
                    </fieldset>
                    <p style="display: none !important;"><label>&#916;<textarea name="ak_hp_textarea" cols="45" rows="8" maxlength="100"></textarea></label><input type="hidden" id="ak_js_1" name="ak_js" value="13" />
                        <script>
                            document.getElementById("ak_js_1").setAttribute("value", (new Date()).getTime());
                        </script>
                    </p>
                    <div class="form-submit margin-top-32 ">
                        <button class="contact-submit">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop