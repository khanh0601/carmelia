<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Carmelina
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="homepage";
    return $classes;
} );
get_template_part('header','filterdata');
get_header();
?>
    <section class="section-resort" id="homepage-section-resort">
        <div class="resort-intro">
            <div class="resort-intro-content">
                <h2 class="resort-intro-title">The Resort</h2>
                <p class="resort-intro-description">Our resort is your definition of an ideal getaway choice where precious time is well-spent with your loved ones, and everyday worries washed away. The place to play, to relax and rejoice. </p>
                <a href="#" class="btn-readmore">Discover more</a>
            </div>
        </div>
        <div class="resort-exploration">
            <h3 class="resort-exploration-title">Resort</h3>
            <h4 class="resort-exploration-sub-title">Exploration</h4>

            <div class="resort-exploration-content">
                <div class="container-fluid">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-weeken-tab" data-toggle="tab" href="#nav-weeken" role="tab" aria-controls="nav-weeken" aria-selected="true">Weeken Getaway</a>
                            <a class="nav-item nav-link active" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab" aria-controls="nav-family" aria-selected="false">Family Getaway</a>
                            <a class="nav-item nav-link" id="nav-adventures-tab" data-toggle="tab" href="#nav-adventures" role="tab" aria-controls="nav-adventures" aria-selected="false">Adventurers</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane" id="nav-weeken" role="tabpanel" aria-labelledby="nav-weeken-tab">
                            <div class="exploration">
                                <div class="exploration-group-items">
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x500"/><span>Private Garthering</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x500"/><span>Private Garthering</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x150"/><span>The dreams you dreamt</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x150"/><span>The dreams you dreamt</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x800"/><span>Free your inner self</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x800"/><span>Free your inner self</span></div></div>
                                </div>
                                <div class="exploration-item-content">
                                    <h5>weeken Getaway</h5>
                                    <h6>Your Escape in the land of Viet Nam!</h6>
                                    <p>
                                        Walk on the beach or take a dip in the state-of-the-arts swimming pool, it is up to you. Neither? Try as you might our countless sporty activities with world-class equipments available at Carmelina.
                                    </p>
                                    <a href="#" class="btn-readmore">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="nav-family" role="tabpanel" aria-labelledby="nav-family-tab">
                            <div class="exploration">
                                <div class="exploration-group-items">
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x500"/><span>Private Garthering</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x500"/><span>Private Garthering</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x150"/><span>The dreams you dreamt</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x150"/><span>The dreams you dreamt</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x800"/><span>Free your inner self</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x800"/><span>Free your inner self</span></div></div>
                                </div>
                                <div class="exploration-item-content">
                                    <h5>Family Getaway</h5>
                                    <h6>Your Escape in the land of Viet Nam!</h6>
                                    <p>Walk on the beach or take a dip in the state-of-the-arts swimming pool, it is up to you. Neither? Try as you might our countless sporty activities with world-class equipments available at Carmelina. </p>
                                    <a href="#" class="btn-readmore">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-adventures" role="tabpanel" aria-labelledby="nav-adventures-tab">
                            <div class="exploration">
                                <div class="exploration-group-items">
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x500"/><span>Private Garthering</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x500"/><span>Private Garthering</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x150"/><span>The dreams you dreamt</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x150"/><span>The dreams you dreamt</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x800"/><span>Free your inner self</span></div></div>
                                    <div class="exploration-item"><div class="exploration-item-image"><img src="https://via.placeholder.com/400x800"/><span>Free your inner self</span></div></div>
                                </div>
                                <div class="exploration-item-content">
                                    <h5>adventures</h5>
                                    <h6>Your Escape in the land of Viet Nam!</h6>
                                    <p>Walk on the beach or take a dip in the state-of-the-arts swimming pool, it is up to you. Neither? Try as you might our countless sporty activities with world-class equipments available at Carmelina. </p>
                                    <a href="#" class="btn-readmore">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="session-destination">
        <div class="saobien"></div>
        <div class="saobiennho"></div>
        <h3>Delightful</h3>
        <h4>Destination</h4>

        <div class="destination-content">

            <nav>
                <div class="nav nav-tabs" id="nav-destination" role="tablist">
                    <a class="nav-item nav-link" id="nav-destination1-tab" data-toggle="tab" data-room-type="1" href="#nav-destination1" role="tab" aria-controls="nav-destination1" aria-selected="true">Deluxe Room Garden<br/>View Double Bed</a>
                    <a class="nav-item nav-link active" id="nav-destination2-tab" data-toggle="tab" data-room-type="2" href="#nav-destination2" role="tab" aria-controls="nav-destination2" aria-selected="false">Deluxe Room Garden<br/>View Twin Bed</a>
                    <a class="nav-item nav-link" id="nav-destination3-tab" data-toggle="tab" data-room-type="3" href="#nav-destination3" role="tab" aria-controls="nav-destination3" aria-selected="false">Deluxe Bungalow<br/>Pool View</a>
                    <a class="nav-item nav-link" id="nav-destination4-tab" data-toggle="tab" data-room-type="4" href="#nav-destination4" role="tab" aria-controls="nav-destination4" aria-selected="false">Executive<br/>Bungalow</a>
                    <a class="nav-item nav-link" id="nav-destination5-tab" data-toggle="tab" data-room-type="5" href="#nav-destination5" role="tab" aria-controls="nav-destination5" aria-selected="false">Premium<br/>Bungalow</a>
                    <a class="nav-item nav-link" id="nav-destination6-tab" data-toggle="tab" data-room-type="6" href="#nav-destination6" role="tab" aria-controls="nav-destination6" aria-selected="false">Ocean Suite<br/>Beach Front</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContentDestination">
                <div class="tab-pane fade" id="nav-destination1" role="tabpanel" aria-labelledby="nav-destination1-tab">
                    <div class="destination container">
                        <div class="destination-slider-con">
                            <div class="destination-slider-wrap">
                                <div class="destination-slider-arrow" id="destination-slider-arrow-1">
                                    <a class="destination-slider-arrow-pre" id="destination-slider-arrow-1-pre"></a>
                                    <a class="destination-slider-arrow-next" id="destination-slider-arrow-1-next"></a>
                                </div>
                                <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-1" data-arrow="destination-slider-arrow-1">
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x500"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/900x300"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x400"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/800x800"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/100x500"/></div></div>
                                </div>
                                <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-1"></div>
                            </div>
                        </div>
                        <div class="destination-sumary">
                            <h3>Deluxe Room Garden View Double Bed</h3>
                            <p>Spectacular sea view as well as pool view, this room for those who wish to look over the sea and white sandy beach from all sides in the room. It is furnished modern equipments especially sauna system, Jacuzzi bathtub for health care.</p>
                            <a class="btn-readmore">Detail</a>
                        </div>
                        <div class="destination-form">
                            <form name="checkin-pre">
                                <div class="destination-form-grid">
                                    <div class="check-in">
                                        <h6>Check In</h6>
                                        <a class="check-in-date" href="javascript:void(0);">
                                            <span class="check-in-date-dd">08</span><span class="check-in-date-mm">12</span>
                                        </a>
                                        <input type="text" class="checkin-pre" value="">
                                    </div>

                                    <div class="check-out">
                                        <h6>Check Out</h6>
                                        <a class="check-out-date" href="javascript:void(0);">
                                            <span class="check-out-date-dd">08</span><span class="check-out-date-mm">12</span>
                                        </a>
                                    </div>

                                    <div class="room-number">
                                        <div class="input-field col s12">
                                            <select class="room-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Room</label>
                                        </div>
                                    </div>

                                    <div class="guest-number">
                                        <div class="input-field col s12">
                                            <select class="guest-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Guest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="destination-form-submit">
                                    <a class="btn-wave scroll" href="#checkin-form">Make Reservation</a>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade show active" id="nav-destination2" role="tabpanel" aria-labelledby="nav-destination2-tab">
                    <div class="destination container">
                        <div class="destination-slider-con">
                            <div class="destination-slider-wrap">
                                <div class="destination-slider-arrow" id="destination-slider-arrow-2">
                                    <a class="destination-slider-arrow-pre" id="destination-slider-arrow-2-pre"></a>
                                    <a class="destination-slider-arrow-next" id="destination-slider-arrow-2-next"></a>
                                </div>
                                <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-2" data-arrow="destination-slider-arrow-2">
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x500"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/900x300"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x400"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/800x800"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/100x500"/></div></div>
                                </div>
                                <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-2"></div>
                            </div>
                        </div>
                        <div class="destination-sumary">
                            <h3>Deluxe Room Garden View Twin Bed</h3>
                            <p>Spectacular sea view as well as pool view, this room for those who wish to look over the sea and white sandy beach from all sides in the room. It is furnished modern equipments especially sauna system, Jacuzzi bathtub for health care.</p>
                            <a class="btn-readmore">Detail</a>
                        </div>
                        <div class="destination-form">
                            <form name="checkin-pre">
                                <div class="destination-form-grid">
                                    <div class="check-in">
                                        <h6>Check In</h6>
                                        <a class="check-in-date" href="javascript:void(0);">
                                            <span class="check-in-date-dd">08</span><span class="check-in-date-mm">12</span>
                                        </a>
                                        <input type="text" class="checkin-pre" value="">
                                    </div>

                                    <div class="check-out">
                                        <h6>Check Out</h6>
                                        <a class="check-out-date" href="javascript:void(0);">
                                            <span class="check-out-date-dd">08</span><span class="check-out-date-mm">12</span>
                                        </a>
                                    </div>

                                    <div class="room-number">
                                        <div class="input-field col s12">
                                            <select class="room-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Room</label>
                                        </div>
                                    </div>

                                    <div class="guest-number">
                                        <div class="input-field col s12">
                                            <select class="guest-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Guest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="destination-form-submit">
                                    <a class="btn-wave scroll" href="#checkin-form">Make Reservation</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-destination3" role="tabpanel" aria-labelledby="nav-destination3-tab">
                    <div class="destination container">
                        <div class="destination-slider-con">
                            <div class="destination-slider-wrap">
                                <div class="destination-slider-arrow" id="destination-slider-arrow-3">
                                    <a class="destination-slider-arrow-pre" id="destination-slider-arrow-3-pre"></a>
                                    <a class="destination-slider-arrow-next" id="destination-slider-arrow-3-next"></a>
                                </div>
                                <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-3" data-arrow="destination-slider-arrow-3">
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x500"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/900x300"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x400"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/800x800"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/100x500"/></div></div>
                                </div>
                                <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-3"></div>
                            </div>
                        </div>
                        <div class="destination-sumary">
                            <h3>Deluxe Bungalow Pool View</h3>
                            <p>Spectacular sea view as well as pool view, this room for those who wish to look over the sea and white sandy beach from all sides in the room. It is furnished modern equipments especially sauna system, Jacuzzi bathtub for health care.</p>
                            <a class="btn-readmore">Detail</a>
                        </div>
                        <div class="destination-form">
                            <form name="checkin-pre">
                                <div class="destination-form-grid">
                                    <div class="check-in">
                                        <h6>Check In</h6>
                                        <a class="check-in-date" href="javascript:void(0);">
                                            <span class="check-in-date-dd">08</span><span class="check-in-date-mm">12</span>
                                        </a>
                                        <input type="text" class="checkin-pre" value="">
                                    </div>

                                    <div class="check-out">
                                        <h6>Check Out</h6>
                                        <a class="check-out-date" href="javascript:void(0);">
                                            <span class="check-out-date-dd">08</span><span class="check-out-date-mm">12</span>
                                        </a>
                                    </div>

                                    <div class="room-number">
                                        <div class="input-field col s12">
                                            <select class="room-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Room</label>
                                        </div>
                                    </div>

                                    <div class="guest-number">
                                        <div class="input-field col s12">
                                            <select class="guest-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Guest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="destination-form-submit">
                                    <a class="btn-wave scroll" href="#checkin-form">Make Reservation</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-destination4" role="tabpanel" aria-labelledby="nav-destination4-tab">
                    <div class="destination container">
                        <div class="destination-slider-con">
                            <div class="destination-slider-wrap">
                                <div class="destination-slider-arrow" id="destination-slider-arrow-4">
                                    <a class="destination-slider-arrow-pre" id="destination-slider-arrow-4-pre"></a>
                                    <a class="destination-slider-arrow-next" id="destination-slider-arrow-4-next"></a>
                                </div>
                                <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-4" data-arrow="destination-slider-arrow-4">
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x500"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/900x300"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x400"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/800x800"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/100x500"/></div></div>
                                </div>
                                <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-4"></div>
                            </div>
                        </div>
                        <div class="destination-sumary">
                            <h3>Executive Bungalow</h3>
                            <p>Spectacular sea view as well as pool view, this room for those who wish to look over the sea and white sandy beach from all sides in the room. It is furnished modern equipments especially sauna system, Jacuzzi bathtub for health care.</p>
                            <a class="btn-readmore">Detail</a>
                        </div>
                        <div class="destination-form">
                            <form name="checkin-pre">
                                <div class="destination-form-grid">
                                    <div class="check-in">
                                        <h6>Check In</h6>
                                        <a class="check-in-date" href="javascript:void(0);">
                                            <span class="check-in-date-dd">08</span><span class="check-in-date-mm">12</span>
                                        </a>
                                        <input type="text" class="checkin-pre" value="">
                                    </div>

                                    <div class="check-out">
                                        <h6>Check Out</h6>
                                        <a class="check-out-date" href="javascript:void(0);">
                                            <span class="check-out-date-dd">08</span><span class="check-out-date-mm">12</span>
                                        </a>
                                    </div>

                                    <div class="room-number">
                                        <div class="input-field col s12">
                                            <select class="room-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Room</label>
                                        </div>
                                    </div>

                                    <div class="guest-number">
                                        <div class="input-field col s12">
                                            <select class="guest-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Guest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="destination-form-submit">
                                    <a class="btn-wave scroll" href="#checkin-form">Make Reservation</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-destination5" role="tabpanel" aria-labelledby="nav-destination5-tab">
                    <div class="destination container">
                        <div class="destination-slider-con">
                            <div class="destination-slider-wrap">
                                <div class="destination-slider-arrow" id="destination-slider-arrow-5">
                                    <a class="destination-slider-arrow-pre" id="destination-slider-arrow-5-pre"></a>
                                    <a class="destination-slider-arrow-next" id="destination-slider-arrow-5-next"></a>
                                </div>
                                <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-5" data-arrow="destination-slider-arrow-5">
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x500"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/900x300"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x400"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/800x800"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/100x500"/></div></div>
                                </div>
                                <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-5"></div>
                            </div>
                        </div>
                        <div class="destination-sumary">
                            <h3>Premium Bungalow</h3>
                            <p>Spectacular sea view as well as pool view, this room for those who wish to look over the sea and white sandy beach from all sides in the room. It is furnished modern equipments especially sauna system, Jacuzzi bathtub for health care.</p>
                            <a class="btn-readmore">Detail</a>
                        </div>
                        <div class="destination-form">
                            <form name="checkin-pre">
                                <div class="destination-form-grid">
                                    <div class="check-in">
                                        <h6>Check In</h6>
                                        <a class="check-in-date" href="javascript:void(0);">
                                            <span class="check-in-date-dd">08</span><span class="check-in-date-mm">12</span>
                                        </a>
                                        <input type="text" class="checkin-pre" value="">
                                    </div>

                                    <div class="check-out">
                                        <h6>Check Out</h6>
                                        <a class="check-out-date" href="javascript:void(0);">
                                            <span class="check-out-date-dd">08</span><span class="check-out-date-mm">12</span>
                                        </a>
                                    </div>

                                    <div class="room-number">
                                        <div class="input-field col s12">
                                            <select class="room-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Room</label>
                                        </div>
                                    </div>

                                    <div class="guest-number">
                                        <div class="input-field col s12">
                                            <select class="guest-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Guest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="destination-form-submit">
                                    <a class="btn-wave scroll" href="#checkin-form">Make Reservation</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-destination6" role="tabpanel" aria-labelledby="nav-destination6-tab">
                    <div class="destination container">
                        <div class="destination-slider-con">
                            <div class="destination-slider-wrap">
                                <div class="destination-slider-arrow" id="destination-slider-arrow-6">
                                    <a class="destination-slider-arrow-pre" id="destination-slider-arrow-6-pre"></a>
                                    <a class="destination-slider-arrow-next" id="destination-slider-arrow-6-next"></a>
                                </div>
                                <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-6" data-arrow="destination-slider-arrow-6">
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x500"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/900x300"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/400x400"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/800x800"/></div></div>
                                    <div><div class="destination-slider-item"><img src="https://via.placeholder.com/100x500"/></div></div>
                                </div>
                                <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-6"></div>
                            </div>
                        </div>
                        <div class="destination-sumary">
                            <h3>Ocean Suite Beach Front</h3>
                            <p>Spectacular sea view as well as pool view, this room for those who wish to look over the sea and white sandy beach from all sides in the room. It is furnished modern equipments especially sauna system, Jacuzzi bathtub for health care.</p>
                            <a class="btn-readmore">Detail</a>
                        </div>
                        <div class="destination-form">
                            <form name="checkin-pre">
                                <div class="destination-form-grid">
                                    <div class="check-in">
                                        <h6>Check In</h6>
                                        <a class="check-in-date" href="javascript:void(0);">
                                            <span class="check-in-date-dd">08</span><span class="check-in-date-mm">12</span>
                                        </a>
                                        <input type="text" class="checkin-pre" value="">
                                    </div>

                                    <div class="check-out">
                                        <h6>Check Out</h6>
                                        <a class="check-out-date" href="javascript:void(0);">
                                            <span class="check-out-date-dd">08</span><span class="check-out-date-mm">12</span>
                                        </a>
                                    </div>

                                    <div class="room-number">
                                        <div class="input-field col s12">
                                            <select class="room-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Room</label>
                                        </div>
                                    </div>

                                    <div class="guest-number">
                                        <div class="input-field col s12">
                                            <select class="guest-number-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">10+</option>
                                            </select>
                                            <label>Number Of Guest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="destination-form-submit">
                                    <a class="btn-wave scroll" href="#checkin-form">Make Reservation</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-calendar">
        <div class="calendar">
            <div class="calendar-filter">
                <div class="calendar-filter-content">
                    <h5>Carmelina</h5>
                    <h6>Calendar</h6>
                    <p>Discover our monthly events to make your trip be more memorable</p>
                    <div class="calendar-filter-select">
                        <select id="calendar-filter-m">
                            <option value="jan">January</option>
                            <option value="feb">February</option>
                            <option value="mar">Mar</option>
                            <option value="apr">Apr</option>
                            <option value="may">May</option>
                            <option value="jun">Jun</option>
                            <option value="jul">Jul</option>
                            <option value="aug">Aug</option>
                            <option value="sept">Sept</option>
                            <option value="oct">Oct</option>
                            <option value="nov">Nov</option>
                            <option value="dec" selected>Dec</option>
                        </select>
                    </div>
                </div>
                <div class="calendar-filter-arrow">
                    <a class="calendar-filter-arrow-pre"></a>
                    <a class="calendar-filter-arrow-next"></a>
                </div>
            </div>
            <div class="calendar-content">
                <div class="calendar-content-slider">
                    <div class="calendar-content-item-container jan">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jan</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>11</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/100x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>18</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container mar">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>30</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Mar</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container apr">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>04</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Apr</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container may">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>May</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jun">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jun</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jul">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jul</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container aug">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Aug</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container sept">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Sept</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container oct">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Oct</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container nov">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>21</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Nov</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container dec">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>02</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Dec</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container jan">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jan</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>11</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/100x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>18</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container mar">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>30</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Mar</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container apr">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>04</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Apr</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container may">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>May</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jun">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jun</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jul">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jul</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container aug">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Aug</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container sept">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Sept</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container oct">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Oct</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container nov">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>21</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Nov</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container dec">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>02</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Dec</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container jan">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jan</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>11</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/100x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>18</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container mar">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>30</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Mar</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container apr">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>04</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Apr</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container may">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>May</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jun">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jun</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jul">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jul</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container aug">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Aug</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container sept">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Sept</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container oct">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Oct</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container nov">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>21</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Nov</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container dec">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>02</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Dec</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="calendar-content-item-container jan">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jan</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>11</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/100x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>18</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container mar">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>30</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Mar</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container apr">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>04</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Apr</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container may">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>May</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jun">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jun</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jul">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jul</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container aug">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Aug</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container sept">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Sept</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container oct">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Oct</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container nov">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>21</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Nov</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container dec">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>02</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Dec</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container jan">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jan</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/1400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>11</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container feb">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/100x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>18</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Feb</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container mar">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x1500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>30</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Mar</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container apr">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x500"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>04</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Apr</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container may">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>May</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jun">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jun</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container jul">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>24</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Jul</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container aug">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Aug</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container sept">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Sept</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container oct">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>12</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Oct</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content-item-container nov">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>21</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Nov</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-content-item-container dec">
                        <div class="calendar-content-item">
                            <img src="https://via.placeholder.com/400x400"/>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span>02</span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span>Dec</span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5>Acoustic Night</h5>
                                    <p>Far from being just an ordinary getaway, the stay at Carmelina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid overflow-hidden">
            <div class="home-gallery-con">
                <div class="home-gallery">
                    <div class="home-gallery-intro">
                        <div class="home-gallery-intro-content">
                            <h5>Carmelina</h5>
                            <h6>Gallery</h6>
                            <p>Discover our gallery to make your trip be more memorable.</p>
                            <a href="#" class="btn-wave">See more</a>
                        </div>
                    </div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                    <div class="home-gallery-item"><img src="https://via.placeholder.com/500x500"/></div>
                </div>
            </div>
        </div>

    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();