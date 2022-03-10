<div class="footer">
<div class="container">
<div class="row  d-flex justify-content-around">

    <!-- footer block start -->
    <div class="col-md-4 col-sm-6">
        <div class=" footer_card">
            <div class=" footer_card_item">
                <div class="card-title text-center">
                    <h4 class="footer-text-title" style="color: #FFFFFF">Apie mane</h4>
                </div>
                <div class="card-text text-justify">
                    Esu motyvuotas pradedantysis programuotojas, domiuosi naujovėmis ir programavimu.
                </div>
                <div class=" footer-contact-link pt-5 ">

{{--                    <ul class="d-flex" style="list-style: none; font-size: 1.5rem">--}}
{{--                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                        <li class="ml-3"><a href="#"><i class="fab fa-youtube"></i></a></li>--}}
{{--                    </ul>--}}


                </div>
            </div>
        </div>
    </div>
    <!-- footer block end -->

    <!-- footer block start -->
    <div class="col-md-4 col-sm-6">
        <div class="footer_card">
            <div class="footer_card_item">
                <div class="card-title text-center">
                    <h4 class="footer-text-title" style="color: #FFFFFF">Straipsniai</h4>
                </div>
                <div class="card-text text-justify footer_card_links text-center">

                    <ul>


                                    @foreach($random_posts as $random_post)
                                <li><a href="{{ route('posts.show', $random_post['id']) }}">{{ ucfirst($random_post['title']) }}</a></li>
                                    @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer block end -->

    <!-- footer block start -->
    <div class="col-md-4 col-sm-6 ">
        <div class="footer_card">
            <div class=" footer_card_item">
                <div class="card-title  text-center">
                    <h4 class="footer-text-title" style="color: #FFFFFF">Komentaras</h4>
                </div>
                <div class="card-comments text-justify footer_card_text text-center pt-1">


                    @if($random_comments->count() == 0)
                        <h4>Šiuo metu nėra jokiu komentaru</h4>
                        @else
                        @foreach($random_comments as $random_comment)
                            <li style="list-style: none">{!!  ucfirst($random_comment['comment'])  !!} </li>
                            </br>
                            <li style="list-style: none">Autorius: {{  $random_comment['commenter']['email'] }}</li>
                        @endforeach
                        @endif




                </div>
            </div>
        </div>
    </div>
    <!-- footer block end -->


</div>
</div>

<div class="footer-copy">
    <div class="container justify-content-start">
        <div class="row ">
            <div class="col-md-12">
                <p> © 2021 andrejblog <span style="color:#B22222;">andrej@andrejblog.info </span></p>
            </div>
        </div>
    </div>
</div>
</div>



<script src="{{ asset('js/new_my_func.js') }}" defer></script>
</body>
</html>
