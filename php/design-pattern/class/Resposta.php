<?php

interface Resposta {
      public function responde(Requisicao $req, Conta $conta);
}