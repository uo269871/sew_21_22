"use strict";
class CalculadoraBasica{
    constructor(){
        this.operation = ""
        this.memory = ""
        this.pointUsed = false

        document.addEventListener("keydown", (event) => {
            const keyName = event.key.replace(/[^\d.\-\/\*\+]/g, '');
            if (this.solved && !["*", "/", "-", "+"].some(el => keyName.includes(el))) {
                document.querySelector("body > section > form > textarea").textContent = "";
                this.solved = false;
                this.operation = "";
            }
            if (["*", "/", "-", "+"].some(el => keyName.includes(el))) {
                this.solved = false;
            }
            document.querySelector("body > section > form > textarea").textContent += keyName;
            this.operation += keyName
            if (event.code.match("Enter")) {
                this.igual();
                this.solved = true;
            }
        });
    }

    digitos(arg) {
        if (this.solved) {
            document.querySelector("body > section > form > textarea").textContent = "";
            this.solved = false;
            this.operation = "";
            this.shown = ""
        }
        this.operation += arg;
        document.querySelector("body > section > form > textarea").textContent = this.operation;
    }

    punto() {
        if(!this.pointUsed){
            this.operation += ".";
            document.querySelector("body > section > form > textarea").textContent = this.operation;
            this.pointUsed = true
        }
    }

    suma() {
        this.operation += "+";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > section > form > textarea").textContent = this.operation;
    }

    resta() {
        this.operation += "-";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > section > form > textarea").textContent = this.operation;
    }

    mult() {
        this.operation += "*";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > section > form > textarea").textContent = this.operation;
    }

    div() {
        this.operation += "/";
        this.solved = false;
        this.pointUsed = false;
        document.querySelector("body > section > form > textarea").textContent = this.operation;
    }

    igual() {
        this.operation = Number(eval(this.operation));
        document.querySelector("body > section > form > textarea").textContent = this.operation;
        this.solved = true;
        this.pointUsed = false;
    }

    borrar() {
        document.querySelector("body > section > form > textarea").textContent = "";
        this.operation = "";
        this.pointUsed = false;
    }

    mMenos() {
        if (!Number(document.querySelector("body > section > form > textarea").textContent).isNaN) {
            this.memory = Number(eval(this.memory + "-" + document.querySelector("body > section > form > textarea").textContent));
            this.operation = this.memory;
            document.querySelector("body > section > form > textarea").textContent = this.operation;
            this.solved = true
            this.pointUsed = false;
        }
    }

    mMas() {
        if (!Number(document.querySelector("body > section > form > textarea").textContent).isNaN) {
            this.memory = Number(eval(this.memory + "+" + document.querySelector("body > section > form > textarea").textContent));
            this.operation = this.memory;
            document.querySelector("body > section > form > textarea").textContent = this.operation;
            this.solved = true
            this.pointUsed = false;
        }
    }

    mrc() {
        var result = this.memory;
        document.querySelector("body > section > form > textarea").textContent = result;
        this.operation = resultado;
        this.memory = "";
        this.solved = true
        this.pointUsed = false;
    }

}

var c = new CalculadoraBasica()