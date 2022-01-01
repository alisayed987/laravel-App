<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            I'm an example component with count : {{ count }}.
          </div>
          <button @click="inc()">inc</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      count: 0,
      inc() {
        this.count = this.count + 1;
      },
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
