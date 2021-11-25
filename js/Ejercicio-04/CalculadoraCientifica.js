"use strict";
class CalculadoraBasica{
    constructor(){
        this.operation = ""
        this.memory = ""
        this.pointUsed = false

        document.addEventListener("keydown", (event) => {
            const keyName = event.key.replace(/[^\d.\-\/\*\+]/g, '');
            if (this.solved && !["*", "/", "-", "+"].some(el => keyName.includes(el))) {
                document.querySelector("body > form > textarea").textContent = "";
                this.solved = false;
                this.operation = "";
            }
            if (["*", "/", "-", "+"].some(el => keyName.includes(el))) {
                this.solved = false;
            }
            document.querySelector("body > form > textarea").textContent += keyName;
            this.operation += keyName
            if (event.code.match("Enter")) {
                this.igual();
                this.solved = true;
            }
        });
    }

    digitos(arg) {
        if (this.solved) {
            document.querySelector("body > form > textarea").textContent = "";
            this.solved = false;
            this.operation = "";
            this.shown = ""
        }
        this.operation += arg;
        document.querySelector("body > form > textarea").textContent = this.operation;
    }

    punto() {
        if(!this.pointUsed){
            this.operation += ".";
            document.querySelector("body > form > textarea").textContent = this.operation;
            this.pointUsed = true
        }
    }

    suma() {
        this.operation += "+";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation;
    }

    resta() {
        this.operation += "-";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation;
    }

    mult() {
        this.operation += "*";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation;
    }

    div() {
        this.operation += "/";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation;
    }

    igual() {
        this.operation = Number(eval(this.operation));
        document.querySelector("body > form > textarea").textContent = this.operation;
        this.solved = true;
        this.pointUsed = false;
    }

    borrar() {
        document.querySelector("body > form > textarea").textContent = "";
        this.operation = "";
        this.pointUsed = false;
    }

    mMenos() {
        if (!Number(document.querySelector("body > form > textarea").textContent).isNaN) {
            this.memory = Number(eval(this.memory + "-" + document.querySelector("body > form > textarea").textContent));
            this.operation = this.memory;
            document.querySelector("body > form > textarea").textContent = this.operation;
            this.solved = true
            this.pointUsed = false;
        }
    }

    mMas() {
        if (!Number(document.querySelector("body > form > textarea").textContent).isNaN) {
            this.memory = Number(eval(this.memory + "+" + document.querySelector("body > form > textarea").textContent));
            this.operation = this.memory;
            document.querySelector("body > form > textarea").textContent = this.operation;
            this.solved = true
            this.pointUsed = false;
        }
    }

    mrc() {
        var result = this.memory;
        document.querySelector("body > form > textarea").textContent = result;
        this.operation = resultado;
        this.memory = "";
        this.solved = true
        this.pointUsed = false;
    }

}

class CalculadoraCientifica extends CalculadoraBasica{
    constructor(){
        super()
    }

    ln(){
        this.operation = Math.log(document.querySelector("body > form > textarea").textContent)
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    log(){
        this.operation = Math.log10(document.querySelector("body > form > textarea").textContent)
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    pi(){
        this.operation = Math.PI
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    e(){
        this.operation = Math.E
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    abs(){
        this.operation = Math.abs(document.querySelector("body > form > textarea").textContent)
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    fact(){
        this.operation = Math.PI
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    x10(){
        this.operation = Math.pow(10,document.querySelector("body > form > textarea").textContent)
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    x2(){
        this.operation = Math.pow(2,document.querySelector("body > form > textarea").textContent)
        this.solved = true;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = this.operation
    }

    xy(){
        this.operation = document.querySelector("body > form > textarea").textContent + "**"
        var text = document.querySelector("body > form > textarea").textContent + "^"
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > form > textarea").textContent = text
    }

    logxy(){
        // se pone primero x, luego el log, y luego la base

        
    }

    inv(){
        this.operation = "1/" + document.querySelector("body > form > textarea").textContent
        this.solved = true
        this.pointUsed = false
        document.querySelector("body > form > textarea").textContent = eval(this.operation)
    }
}

var c = new CalculadoraCientifica();