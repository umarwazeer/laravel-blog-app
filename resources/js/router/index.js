import { createRouter, createWebHistory } from 'vue-router';
import BlogComponent from '../components/BlogComponent.vue';
import PostBlogComponent from '../components/PostBlogComponent.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: BlogComponent
      },
      {
        path: '/post',
        name: 'post',
        component: PostBlogComponent,

      },

//   {
//     path: '/post',
//     name: 'post',
//     component: PostBlogComponent,
//     props: route => ({ blog: route.query.blog })
//   }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
