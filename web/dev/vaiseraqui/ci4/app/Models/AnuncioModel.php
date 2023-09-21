<?php

namespace App\Models;

use CodeIgniter\Model;

class AnuncioModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'anuncio';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['tipoFK', 'produtoFK1', 'produtoFK2', 'produtoFK3', 'produtoFK4', 'produtoFK5', 'produtoFK6',
      'produtoFK7', 'tipo', 'categoriaFK', 'cidadeFK'];
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;
   
   public function emalta($emAlta) {
       
          $produtoModel = \model("App\Models\ProdutoModel", false);
               
         if ($emAlta->produtoFK1) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[0] = $produtoModel->find($emAlta->produtoFK1);
                        $lojasAlta[0]->fotos = $produtoModel->fotos($emAlta->produtoFK1, 4, true);
                    }
                    if ($emAlta->produtoFK2) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[1] = $produtoModel->find($emAlta->produtoFK2);
                        $lojasAlta[1]->fotos = $produtoModel->fotos($emAlta->produtoFK2, 4, true);
                    }
                    if ($emAlta->produtoFK3) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[2] = $produtoModel->find($emAlta->produtoFK3);
                        $lojasAlta[2]->fotos = $produtoModel->fotos($emAlta->produtoFK3, 4, true);
                    }
                    if ($emAlta->produtoFK4) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[3] = $produtoModel->find($emAlta->produtoFK4);
                        $lojasAlta[3]->fotos = $produtoModel->fotos($emAlta->produtoFK4, 4, true);
                    }
                    if ($emAlta->produtoFK5) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[4] = $produtoModel->find($emAlta->produtoFK5);
                        $lojasAlta[4]->fotos = $produtoModel->fotos($emAlta->produtoFK5, 4, true);
                    }
                     if ($emAlta->produtoFK6) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[5] = $produtoModel->find($emAlta->produtoFK6);
                        $lojasAlta[5]->fotos = $produtoModel->fotos($emAlta->produtoFK6, 4, true);
                    }
                    
                       if ($emAlta->produtoFK7) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $lojasAlta[6] = $produtoModel->find($emAlta->produtoFK7);
                        $lojasAlta[6]->fotos = $produtoModel->fotos($emAlta->produtoFK7, 4, true);
                    }
                    
                    return $lojasAlta;
       
   }
   
}
