<template>
  <div class="container-fluid">
    <div class="d-flex">
      <div class="textTable col-4 text-left align-self-center">
        <div class="textInfoTable">
          <h1>Welcome To</h1>
          <h3>Data Storage Application</h3>
        </div>
      </div>
      <div class="col-8 align-self-center">
        <img
          src="https://user-images.githubusercontent.com/2421068/55276143-0e4ae800-532b-11e9-8031-48d5a575f221.png"
          alt=""
          class="img-fluid imgTable justify-content-md-center"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
.d-flex {
  -webkit-animation: fadein 1.5s;
  padding: 50px 50px 40px 50px;
}

.textInfoTable {
  color: rgb(255, 255, 255);
}
.container-fluid {
  background: hsla(186, 66%, 40%, 1);

  background: linear-gradient(
    90deg,
    hsla(186, 66%, 40%, 1) 0%,
    hsla(188, 78%, 69%, 1) 100%
  );

  background: -moz-linear-gradient(
    90deg,
    hsla(186, 66%, 40%, 1) 0%,
    hsla(188, 78%, 69%, 1) 100%
  );

  background: -webkit-linear-gradient(
    90deg,
    hsla(186, 66%, 40%, 1) 0%,
    hsla(188, 78%, 69%, 1) 100%
  );

  padding: 0 0 17vh 0;
}
@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@media (max-width: 991.98px) {
  .container-fluid .d-flex {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .container-fluid {
    display: flex;
    /* background-color: khaki; */
  }
  .imgTable {
    margin: 20px 0;
  }
  .textTable {
    text-align: center;
    margin: 0 0 10px 0;
  }
}
</style>