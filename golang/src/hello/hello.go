package main

import (
	"fmt"
	"reflect"
)

func main() {
	nome := "Douglas"
	idade := 24
	versao := 1.1

	fmt.Println("Olá, Sr.", nome)
	fmt.Println("Olá, Sr.", nome, "sua idade é", idade)
	fmt.Println("Este programa está na versão", versao)

	fmt.Println("O tipo da variavel nome é", reflect.TypeOf(nome))
	fmt.Println("O tipo da variavel idade é", reflect.TypeOf(idade))
	fmt.Println("O tipo da variavel versao é", reflect.TypeOf(versao))

}
