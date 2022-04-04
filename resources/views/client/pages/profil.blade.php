@extends('client.templates.main_template',['titre'=>"Profil"])


@section('content')


<section class="user-dashboard-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="user-dashboard-box">
      
                    <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title">Profile</div>
                            <div class="subtitle">Add information about yourself to share on your profile.</div>
                        </div>
                        <form action="" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <label for="FristName">Basics:</label>
                                        <input type="text" class="form-control" name="first_name" id="FristName" placeholder="First name" value=" Ben " />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last name" value="Hanson" />
                                    </div>

                                    <div class="form-group">
                                        <label for="Biography">Biography:</label>
                                        <textarea class="form-control" name="biography" id="Biography">Hello, I am currently a university student in USA</textarea>
                                    </div>
                                </div>
                                <div class="link-group">
                                    <div class="form-group">
                                        <input type="text" class="form-control" maxlength="60" name="twitter_link" placeholder="Twitter link" value="https://www.twitter.com/john" />
                                        <small class="form-text text-muted">Add your twitter link.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" maxlength="60" name="facebook_link" placeholder="Facebook link" value="https://www.facebook.com/john" />
                                        <small class="form-text text-muted">Add your facebook link.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" maxlength="60" name="linkedin_link" placeholder="Linkedin link" value="https://www.linkedin.com/john" />
                                        <small class="form-text text-muted">Add your linkedin link.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
