<template>
  <div>
    <h3 class="mb-4">Admin Dashboard</h3>

    <div class="row">
      <div class="col-md-3" v-for="card in stats" :key="card.title">

        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5>{{ card.title }}</h5>
            <h3>{{ card.value }}</h3>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>