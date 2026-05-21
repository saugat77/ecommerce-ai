<template>
  <div>
    <h3 class="mb-4">Shopping Cart</h3>

    <div class="card">
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="item in cart" :key="item.id">
              <td>{{ item.name }}</td>
              <td>
                <input type="number" class="form-control w-50" v-model="item.qty" />
              </td>
              <td>{{ item.price }}</td>
              <td>{{ item.qty * item.price }}</td>
            </tr>
          </tbody>
        </table>

        <div class="text-end">
          <button class="btn btn-success">
            Checkout
          </button>
        </div>

      </div>
    </div>
  </div>
</template>