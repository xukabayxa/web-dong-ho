<script>
    class Config extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

		clearImage() {
			if (this.image) this.image.clear();
		}

        get favicon() {
            return this._favicon;
        }

        set favicon(value) {
            this._favicon= new Image(value, this);
        }

        clearFavicon() {
            if (this.favicon) this.favicon.clear();
        }

        get submit_data() {

            let data = {
                web_title: this.web_title,
                web_des: this.web_des,
                email: this.email,
                twitter: this.twitter,
                instagram: this.instagram,
                youtube: this.youtube,
                facebook: this.facebook,
                hotline: this.hotline,
                zalo: this.zalo,
                address: this.address,
                location: this.location,
                click_call: this.click_call,
                facebook_chat: this.facebook_chat,
                zalo_chat: this.zalo_chat,
                phone_switchboard: this.phone_switchboard,
                introduction: this.introduction,
            }
            console.log(data);
            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);

            let favicon = this.favicon.submit_data;
            if (favicon) data.append('favicon', favicon);

            return data;
        }
    }
</script>
