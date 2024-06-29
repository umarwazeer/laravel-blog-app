<template>
    <div id="app">
      <h1>{{ formData.id ? 'Edit Blog' : 'Create New Blog' }}</h1>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="form">
              <div class="form-group">
                <label>Note Title*</label>
                <input class="form-control" type="text" v-model="formData.title" required>
              </div>
              <div class="form-group">
                <label>Note Text*</label>
                <textarea type="textarea" rows="3" class="form-control" v-model="formData.content" required></textarea>
              </div>
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" id="image" type="file" @change="handleImageUpload">
              </div>
              <div class="form-group">
                <label>Video</label>
                <input class="form-control" id="video" type="file" @change="handleVideoUpload">
              </div>
              <button class="btn btn-primary" @click="submitForm">{{ formData.id ? 'Update Post' : 'Create Post' }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';
  import Toast, { useToast } from 'vue-toastification';

  export default {
    data() {
      return {
        formData: {
          id: null,
          title: '',
          content: '',
          image: null,
          video: null
        }
      };
    },

    created() {
        const blogData = localStorage.getItem('blogData');
        if (blogData) {
            const blog = JSON.parse(blogData);
            console.log("blog", blog)
            this.formData.id = blog.id;
            this.formData.title = blog.title;
            this.formData.content = blog.content;
            // if (blog.image) {
            //     this.formData.imageUrl = this.getMediaUrl(blog.image);
            // }
            // if (blog.video) {
            //     this.formData.videoUrl = this.getMediaUrl(blog.video);
            // }
            localStorage.removeItem('blogData');
        }
    },

    methods: {

      handleImageUpload(event) {
        this.formData.image = event.target.files[0];
      },
      handleVideoUpload(event) {
        this.formData.video = event.target.files[0];
      },

      submitForm() {
        if (this.formData.id) {
            this.updateBlog();
        } else {
            this.createBlog();
        }
      const formData = new FormData();
      formData.append('title', this.formData.title);
      formData.append('content', this.formData.content);
      if (this.formData.image) {
        formData.append('image', this.image);
      }
      if (this.formData.video) {
        formData.append('video', this.video);
      }

    //
    },

    async createBlog(formData) {
        console.log("cretepostmehtod")
        const toast = useToast();

        try {
        const response = await axios.post('http://127.0.0.1:8000/blogs', this.formData,
         {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
    );  this.resetForm()
        toast.success("blog created successfully")
        console.log('Blog created successfully', response.data);
      } catch (error) {
        console.error('Error creating blog:', error);
      }
      },

      async updateBlog() {
        console.log("updateData", this.formData)
  const toast = useToast();
  try {
    // const formData = new FormData();
    // formData.append('title', this.formData.title);
    // formData.append('content', this.formData.content);
    // if (this.formData.image) {
    //   formData.append('image', this.formData.image);
    // }

    // if (this.formData.video) {
    //   formData.append('video', this.formData.video);
    // }

    const response = await axios.put(`http://127.0.0.1:8000/blogs/${this.formData.id}`, this.formData,
    //  {
    //   headers: {
    //     'Content-Type': 'multipart/form-data'
    //   }
    // }
);

    toast.success("Blog updated successfully");
    console.log('Blog updated successfully', response.data);
    this.$router.push('/');
    this.resetForm()
  } catch (error) {
    // if (error.response) {
    //   console.error('Validation errors:', error.response.data.errors);
    //   toast.error("Error updating blog: " + JSON.stringify(error.response.data.errors));
    // } else {
      console.error('Error updating blog:', error);
      toast.error("Error updating blog: " + error.message);
    // }
  }
      },

      resetForm() {
      this.formData.title = '';
      this.formData.content = '';
      this.formData.image = null;
      this.formData.video = null;
    }

    }

  };
  </script>

<style scoped>
body {
    font-size: 14px;
    min-width: 300px;
    font-family: 'Ubuntu', sans-serif;
    background: #f3f3f3;
    margin: 0;
    -webkit-user-select: none;
    user-select: none;
    padding: 70px 30px 0px 30px;
    font-weight: 100;
}
.card {
margin: 20px 0;
background: #ffffff;
border: 10px;
padding: 20px;
}
.container{
align-items: center;
}
label{
font-size: 17px;
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
font-weight: 50;

/* margin-bottom: 20px; */
/* margin-left: 20px; */
}
button.btn {
padding-bottom: 40px;
    display: block;
    padding: 15px 20px;
    font-family: 'Ubuntu', sans-serif;
    margin: 15px 0px;
width: 608px;
    box-shadow: 0px 1px 3px rgb(217, 217, 217);
    border: none;
    border-radius: 2px;
}
h1 {
text-align: center;
margin: 15px 0px;
}
h2 {
text-align: center;
margin: 15px 0px;
color: #b5b5b5;
}
h4.card-title {
    margin: 5px 0px 15px 0px;
}
p.card-text {
    margin: 25px 0px 0px 0px;
}
.card {
border-radius: 3px;
box-shadow: 0px 2px 3px rgb(217, 217, 217);
}
.alert {
    display: none;
}
.active {
    display: block;
}
.col-sm-12 > div {
    max-width: 600px;
    margin: 0px auto;
    }
.btn {
    margin-bottom: 30px;
    background-color: #044868;
    color:#ffffff
}
.btn:hover{
    background-color: #022636;
    font-size: 15px
}
.form{
    width: 500px;
    padding-top: 0px;
}
.form-group{
    padding-top: 20px;
}
.form-control{
    width: 600px;
    outline-offset:30rem;
    margin-top: 5px;

}
.form-control[type='text']{
    height: 30px;
    outline-offset:30rem;
}
.form-control[type='textarea']{
    height: 100px;
    outline-offset:30rem;
}
.form.label{
text-align: left;
}
</style>
