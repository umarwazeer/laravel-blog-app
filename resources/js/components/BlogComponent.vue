<template>
    <div>
      <div class="row">
        <div class="blog-section">
          <div class="card" v-for="blog in blogs" :key="blog.id">
            <!-- <div v-else-if="blog.video">
              <video class="card__video" controls>
                <source :src="getVideoUrl(blog.video)" type="video/mp4">
              </video>
            </div> -->
            <div >
                <div v-if="blog.image">
              <img class="card__img" :src="getImageUrl(blog.image)" alt="Blog Image">
            </div>
              <h4 class="card-title">{{ blog.title }}</h4>
              <h4 class="card-date">{{ blog.created_at }}</h4>
              <h6 class="card-subtitle mb-3">{{ blog.content }}</h6>
            </div>

            <a href="#" @click="editPost(blog)" class="btn btn-edit"><i class="material-icons">edit</i></a>
            <a href="#" @click="deleteBlog(blog)" class="btn btn-delete"><i class="material-icons">delete</i></a>
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
        blogs: [],
      };
    },
    mounted() {
      this.fetchBlogs();
    },
    methods: {
      async fetchBlogs() {
        try {
          const response = await axios.get('http://127.0.0.1:8000/blogs');
          this.blogs.push(this.imagePath)
          this.blogs = response.data;
          console.log("Fetched blogs:", this.blogs);
        } catch (error) {
          console.error('Error fetching blogs:', error);
        }
      },

      editPost(blog) {
            localStorage.setItem('blogData', JSON.stringify(blog));
            this.$router.push({ name: 'post' });
            console.log('Edit post', blog);
                },

      deleteBlog(blog) {
        const toast = useToast();
        if (!blog || !blog.id) {
          console.error('Invalid blog object or blog ID');
          return;
        }

        axios.delete(`http://127.0.0.1:8000/blogs/${blog.id}`)
          .then(response => {
            toast.success("blog deleted successfully")
            console.log('Blog deleted:', blog.id);

            this.fetchBlogs(); // Refresh blog list after deletion
          })
          .catch(error => {
            console.error('Error deleting blog:', error);
            toast.error("blog not deleted!")

          });
      },

        getImageUrl(imagePath) {
            return `http://127.0.0.1:8000/storage/${imagePath}`;
        },

        getVideoUrl(videoPath) {
            return `http://127.0.0.1:8000/storage/${videoPath}`;
        }

    }
  };
  </script>

<style scoped>
body {
    padding: 0;
    margin: 0;
    font-size: 14px;
    min-width: 300px;
    font-family: 'Ubuntu', sans-serif;
    -webkit-user-select: none;
    user-select: none;
    padding: 70px 30px 0px 30px;
    font-weight: 100;
    background: #F2F2F2;
}
.row{
    color: #ffffff;
    background: rgb(5, 116, 124);
    padding: 2px;
    margin-top: 20px 0px 0px 20px;
    text-align: left;

}
h3{
    margin-left: 10%;
}
img.card__img{
    width: 350px;
    padding:10px;
    width: 95%;
    border-radius: 5%;
    height: 15vw;
    object-fit: cover;

}
.blog-section{
    margin-left: 80px;
    /* justify-content: space-between; */
}
.card:hover{
    transform: scale(1.05);
    box-shadow: 0px 2px 40px #d7dfe2;
    zoom: 1;

}
.card {
    background-color:#faf9f9;
    margin: 20px 0px 0px 40px;
    float: left;
    padding: 0px 0px 0px 0px;
    /* margin-left: 30px; */
    text-align: left;
    border-radius: 10px;
    max-width: 350px;
    box-shadow: 0px 2px 3px rgb(217, 217, 217);
}
/* .card_img{

} */
.card-date{
    color: rgb(99, 96, 96);
    top: 0;
    font-size: 12px;
    margin-left: 10px;
    padding: 0px 20px 0px 0px;
    float: left;
}
.card-title{
    float: left;
    color: rgb(78, 77, 77);
    /* margin-left: 15px; */
    padding: 10px 0px 0px 11px;
    font-size: 20px;
    margin-top: 0px;
    padding-top: 0px;
    line-height: 1.5rem;
    margin: 1rem 0 0.5rem;

}
.card-subtitle{
    float: left;
    /* margin-left: 15px; */
    padding: 0px 0px 0px 11px;
    margin: 0px 0px 5px 0px;
    /* font-size: 14px; */
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    /* color: rgb(95, 94, 94); */
    color: #616b74;
    font-size: 0.9rem;
}
.btn:hover{
    padding: 5px;
    font-weight: 200;
    font-size: 20;


}
.btn{
    color: black;
    float: right;
    padding: 5px;
    margin: 0px 5px 0px 0px;
    font-size: 12px;

}
.btn-edit{
    color: rgb(40, 120, 151);
}
.btn-delete{
    color: red;
}
</style>
