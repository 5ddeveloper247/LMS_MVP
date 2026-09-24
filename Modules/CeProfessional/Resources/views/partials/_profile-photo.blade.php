<div class="ce-profile-photo">
    <input type="hidden" value="{{ route('cePortal.profile.photo') }}" id="ce-ajax-update-profile-image">
    <input type="hidden" value="{{ url('/') }}" id="ce-profile-base-url">
    <div class="profilepic">
        <img class="profilepic__image" src="{{ getProfileImage($user->image) }}" id="ce_show_profile_image"
            width="200" height="200" alt="{{ $user->name }}">
        <div class="profilepic__content">
            <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
            <input type="file" id="ce_profile_image" title="" name="profile_pic" class="profilepic__text"
                accept="image/*">
            <i id="ce_profile_loading" class="fa fa-spinner fa-spin fa-3x fa-fw site_image_spinner"
                style="display: none"></i>
        </div>
    </div>
</div>
