<template >
  <div class="table-responsive">
    <table class="table mb-0 rounded border border-1">
      <thead class="thead-white rounded">
        <tr>
          <th scope="col">ITEMS</th>
          <th scope="col">QAUNTITE</th>
          <th scope="col">PRIX</th>
          <th scope="col">MONTANT</th>
          <th scope="col">REMOVE</th>
        </tr>
      </thead>
      <tbody>
        <tr class="pt-1 pb-1" v-for="row in rows" :key="row.index">
          <td scope="row" width="300">
            <input
              class="form-control"
              style="height:40px"
              type="text"
              v-model="row.item_description"
            >
          </td>
          <td>
            <input
              class="form-control text-right"
              style="height:40px"
              type="number"
              min="0"
              step="1"
              @change="calculateLineTotal(row)"
              v-model="row.item_quantity"
            >
          </td>
          <td>
            <input
              class="form-control text-right font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-primary-400 focus:border-primary-400"
              type="number"
              style="height:40px"
              min="0"
              step="1"
              @change="calculateLineTotal(row)"
              v-model="row.item_price"
            >
          </td>
          <td class="text-center font-weight-bold">
            <p v-text="row.item_ammount"></p>
          </td>
          <td class="cursor-pointer" @click="remove(index)">
            <i class="feather icon-trash ml-5 text-danger"></i>
          </td>
        </tr>
      </tbody>
    </table>
    <div>
      <button
        class="btn btn-block btn-primary font-weight-bold"
        @click.prevent="addNewRow"
        style="border-radius:0"
      >
        <i class="feather icon-plus-circle"></i> AJOUTER NOUVEAU ITEM
      </button>
    </div>

    <div class="pull-right mt-5 border rounded p-2">
      <h6 class="mb-2">FACTURE DETAILS</h6>
      <hr>
      <div class="d-flex justify-content-between mb-1">
        <h6 class="mr-5 text-muted">
          <i class="feather icon-activity mr-1"></i> sous-total
        </h6>
        <h6 class="ml-5">{{invoice_subtotal}}</h6>
      </div>
      <div class="d-flex justify-content-between mb-1">
        <h6 class="mr-5 text-muted">
          <i class="feather icon-percent mr-1"></i> tva
        </h6>

        <h6 class="ml-5">{{invoice_shipping}}</h6>
      </div>
      <div class="d-flex justify-content-between mb-1">
        <h6 class="mr-5 text-muted">
          <i class="feather icon-truck mr-1"></i> livraison
        </h6>

        <h6 class="ml-5">{{invoice_shipping}}</h6>
      </div>
      <div class="d-flex justify-content-between mb-1">
        <h6 class="mr-5 text-muted">
          <i class="feather icon-arrow-down mr-1"></i> reduction
        </h6>

        <h6 class="ml-5">{{invoice_discount}}</h6>
      </div>
      <hr>
      <div class="d-flex justify-content-between mt-1">
        <h6 class="mr-5">total:</h6>
        <h6 class="ml-5 text-danger">{{invoice_total}}</h6>
      </div>
    </div>
  </div>
</template>


<script>
import { reactive } from "vue";
import { ref } from "vue";
import { inject } from "vue";

export default {
  setup() {
    let invoice_subtotal = ref(0);
    let invoice_total = ref(0);
    let invoice_tax = ref(5);
    let invoice_discount = ref(5);
    let invoice_shipping = ref(5);

    const rows = ref([
      {
        item_description: "",
        item_quantity: 1,
        item_price: 0,
        item_ammount: ""
      }
    ]);

    const addNewRow = () => {
      rows.value.push([
        {
          item_description: "",
          item_quantity: 1,
          item_price: 0,
          item_ammount: ""
        }
      ]);
    };
    const remove = index => {
      rows.value.splice(index, 1);
    };

    const calculateTotal = () => {
      var subtotal, total;
      subtotal = rows.value.reduce(function(sum, item) {
        var lineTotal = parseFloat(item.item_ammount);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      }, 0);

      invoice_subtotal = subtotal.toFixed(2);
      //console.log(invoice_tax / 100);

      total = subtotal * (5 / 100) + subtotal;
      total = parseFloat(total);

      if (!isNaN(total)) {
        invoice_total = total.toFixed(2);
      } else {
        invoice_total = "0.00";
      }
      console.log(invoice_total);
    };
    const calculateLineTotal = row => {
      var total = parseFloat(row.item_price) * parseFloat(row.item_quantity);

      if (!isNaN(total)) {
        row.item_ammount = total.toFixed(2);
      }
      calculateTotal();
    };
    return {
      rows,
      addNewRow,
      remove,
      calculateTotal,
      calculateLineTotal,
      invoice_total,
      invoice_shipping,
      invoice_tax,
      invoice_subtotal,
      invoice_discount
    };
  }
};
</script>


