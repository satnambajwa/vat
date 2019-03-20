class Action {
    
    calculator(val){
        var data1 = this.state.data;
        var Total = 0;
        var totalTax=0;
        var subTotal=0;
        var totalDicount = 0;
        data1.items.map(function(item,index){
            var amount = item.unit_price*item.quantity;
            var discount = amount*item.discount/100;
            var taxableAmount = amount-discount;
            var tax = taxableAmount*item.tax_rate/100;
            var sub_amount= taxableAmount+tax;
            if(val==index){
                data1.items[val].tax=tax;
                data1.items[val].amount=taxableAmount;
            }
            totalDicount+=  discount;
            totalTax    +=  tax;
            subTotal    +=  taxableAmount;
            Total       +=  sub_amount;
        });
        data1.invoice.sub_total =   subTotal;
        data1.invoice.vat       =   totalTax;
        data1.invoice.discount  =   totalDicount;
        data1.invoice.total     =   Total;
        this.setState({ data:  data1});
    }
    removeRow(val){
        var data1 = this.state.data;
        data1.items.splice(val,1);
        this.setState({ data:  data1});
        this.calculator(val);
    }
    handleChange(e){
        var curent = e.target.innerHTML;
        if(curent != e.target.title){
            var data1 = this.state.data;
            data1.items[e.target.id].discount=curent;
            this.setState({ data:  data1});
            this.calculator(e.target.id);
        }
    }
}