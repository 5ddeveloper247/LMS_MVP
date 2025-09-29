@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ @$product->title }}
@endsection
@section('og_image')
    {{-- asset(@$course->image) --}}
@endsection

<style>
    .ckdtext ul, .ckdtext ol{
        padding: revert;
    }
    .ckdtext li{
        list-style: revert;
    }
    .course__details .video_screen {
        background-image: url('{{-- getCourseImage(@$course->image) --}}');
    }

    iframe {
        position: relative !important;
    }

    .theme_according .card .card-header h5 button {
        padding: 12.3px 25px 13px 30px;
    }

    .table-responsive {

        overflow-x: clip !important;
       scrollbar-width: thin;
    }

    .theme_color2 {
        color: var(--system_primery_color);
    }

    .prog_blk {
        padding-bottom: 60vh !important;
    }

    .prog_blk {
        position: relative;
        background: #fff;
        padding: 2.5rem;
        border-radius: 1rem;
        -webkit-box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
        /* box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03); */
        padding: 0;
        padding-bottom: 100%;
        overflow: hidden;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .prog_blk>.txt {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        background: -webkit-gradient(linear, left top, left bottom, from(transparent), to(#111));
        /* background: linear-gradient(transparent, #111); */
        color: #fff;
        padding: 4rem 1.5rem 2.5rem;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    .p-clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;

    }
   
    
    /* .course_tab{
        height: 100%;
    } */
    .img_round{
        border-radius: 10px !important;
        object-fit: cover;
    }
    .img_circle{
        object-fit: none;
    }
 
    .course_image{
        height: 100% !important;
    }

 
@media only screen and (min-width: 2560px) {
   
.course-span{
    font-size: 22px !important;
}
.course_includes li p{
    font-size: 22px !important;
}

}
    /* @media (width > 1650px) {
        .lms_tabmenu li a {
            font-size: 18px;
            font-weight: 600;
            font-family: Source Sans Pro, sans-serif;
            color: var(--system_secendory_color);
            border-radius: 10px;
            padding: 13px 39px;
        }


        h6 {
            font-size: 1.2rem !important
        }

        .h6 {
            font-size: 1.4rem !important
        }

        label {
            color: #7e7e7e;
            cursor: pointer;
            font-size: 23px !important;
        }

        h4 {
            font-size: 32px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 25px !important;
            line-height: 25px;
        }

        .theme_btn {
            font-size: 23px !important;
        }

        .lms_tabmenu li a {
            font-size: 26px !important;
        }
    } */
</style>


@section('mainContent')
    
    
    <x-breadcrumb :banner="@$frontendContent->course_page_banner ?? 'Detail'" :title="trans('Product Details')" :subTitle="$product->title" />
   

    <x-shop-product-detail-section :request="$request" :product="$product" :relatedProducts="$relatedProducts" />

   
@endsection

@section('js')
 
    
@endsection
