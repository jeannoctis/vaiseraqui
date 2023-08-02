function telefone(value) {
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{2})(\d)/, '($1) $2');
  value = value.replace(/(\d{1})(\d{4})(\d{4})$/, '$1 $2 $3');
  return value;
}