

<div class="home__screen">



    <!-- header page -->
    <div id="project">
        <h1> Detail</h1>
        <hr />

        <div class="project-detail-content">
          
            <div class="container">
                <div class="img-block">
                    <div class="img-right">
                        <img src="{{ asset('projectThumnail/'.$objProject->thumbnail_image) }}" id="img-select" alt="">
                    </div>
                    <div class="image-left">

                        @if (!empty($objProject->image))
                        @php
                            $decodedImages = json_decode($objProject->image, true); // Decode JSON once
                        @endphp
                    
                        @if (is_array($decodedImages) && count($decodedImages) > 0)
                            @foreach ($decodedImages as $img)
                                <div class="image-content">
                                    <img src="{{ asset('ProjectImage/' . $img) }}" onclick="selectFuntion(this)" alt="">
                                </div>
                            @endforeach
                        @else
                            <p>No images available.</p>
                        @endif
                    @endif
                    
                        

                    </div>

                </div>
            </div>


            <div class="project-detail-description">
                <p>
                <h1>{{ $objProjectName->name ?? '' }}</h1>
                </p>
                <p>{{ $objProject->description ?? '' }}</p>
                </p>
            </div>
        </div>

    </div>
</div>








<script>
    function selectFuntion(smallimg) {
        const imgSelct = document.getElementById("img-select");
        imgSelct.src = smallimg.src;
    }
</script>
