
<template>
<div id="app">
    <h1>{{ formData.id ? 'Edit Blog' : 'Create New Blog' }}</h1>
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="form">
            <div class="form-group">
                <label> Blog Title*</label>
                <input class="form-control" type="text" v-model="formData.title" required>
            </div>
            <div class="form-group">
                <label>Blog Text*</label>
                <textarea type="textarea" rows="3" class="form-control" v-model="formData.content" required></textarea>
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
import { useToast } from 'vue-toastification'


export default {
    props: ['id'],

    data() {
        return {
            formData: {
            id: null,
            title: '',
            content: ''
      },

        };

    },

    created() {
        const blogData = localStorage.getItem('blogData');
    if (blogData) {
      const blog = JSON.parse(blogData);
        this.formData.id = blog.id;
        this.formData.title = blog.title;
      this.formData.content = blog.content;
      localStorage.removeItem('blogData');
    }
  },

    methods: {
        submitForm() {
        if (this.formData.id) {
            this.updateBlog();
        } else {
            this.createBlog();
        }
    },

    createBlog() {
        const toast = useToast();
        console.log("start the postBlog...", this.formData)
        axios.post('http://127.0.0.1:8000/blogs', this.formData)
          .then(response => {
            console.log('Blog posted:', response.data);
            toast.success('Blog successfully created!');
            this.formData.title = '';
            this.formData.content = '';
          })
          .catch(error => {
            console.error('Error posting blog:', error);
          });
      },
      updateBlog() {
        const toast = useToast();
      console.log("Updating blog...", this.formData);
      axios.put(`http://127.0.0.1:8000/blogs/${this.formData.id}`, this.formData)
        .then(response => {
          toast.success('Blog updated successfully!');
          this.$router.push('/');
          this.formData.title = '';
          this.formData.content = '';
        })
        .catch(error => {
          console.error('Error updating blog:', error);
        });
    }
    }
    }
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





<!-- <template>
    <div>
      <h2>Create New Blog Post</h2>
      <form @submit.prevent="submitForm">
        <div>
          <label for="title">Title:</label>
          <input type="text" id="title" v-model="formData.title" required>
        </div>
        <div>
          <label for="content">Content:</label>
          <textarea id="content" v-model="formData.content" required></textarea>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        formData: {
          title: '',
          content: ''
        }
      };
    },
    methods: {
      submitForm() {
        console.log("start the postBlog...", this.formData)
        axios.post('http://127.0.0.1:8000/blogs', this.formData)
          .then(response => {
            console.log('Blog posted:', response.data);
            // Optionally, you can redirect to another page or update the blog list
            // this.$router.push('/blogs'); // Assuming you are using Vue Router
            this.formData.title = '';
            this.formData.content = '';
          })
          .catch(error => {
            console.error('Error posting blog:', error);
          });
      }
    }
  };
  </script>

  <style scoped>
  /* Add scoped styles here if needed */
  </style> -->
