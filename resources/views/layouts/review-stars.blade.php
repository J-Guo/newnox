<!-- Show review stars based on User or Affiliate Average Rate -->

@if($rate <= 1)
<!-- Average Rate From 0 to 1 -->
<span class="rating blog-rating">
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="width:20%"></span>
    <span class="icon-star" style="width:20%"></span>
    <span class="icon-star" style="width:20%"></span>
    <span class="icon-star" style="width:20%"></span>
</span>
@elseif($rate <= 2)
<!-- Average Rate From 1 to 2 -->
<span class="rating blog-rating">
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="width:20%"></span>
    <span class="icon-star" style="width:20%"></span>
    <span class="icon-star" style="width:20%"></span>
</span>
@elseif($rate <= 3)
<span class="rating blog-rating">
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="width:20%"></span>
    <span class="icon-star" style="width:20%"></span>
</span>
@elseif($rate <= 4)
<span class="rating blog-rating">
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="width:20%"></span>
</span>
@elseif($rate <= 5)
<span class="rating blog-rating">
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
    <span class="icon-star" style="color:#F90; width:18%"></span>
</span>
@endif
