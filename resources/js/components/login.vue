<template>
  <div>
    <form>
      <div>
        <label for="user">Login</label>
        <input type="text" name="user" id="user" />
      </div>
      <div>
        <label for="pass">Password</label>
        <input type="text" name="pass" id="pass" />
      </div>
      <input type="button" value="Login" />
    </form>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("login mounted.");
  },
};
</script>

<style>
input {
  border: solid 2px grey;
}
</style>