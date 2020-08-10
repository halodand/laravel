@component('mail::message')
# Bpk/Ibu {{ $transaction->diproses->name }}
### Berikut adalah data order {{ $transaction->nilai_depo_id ? 'Beli' : 'Jual' }} Anda.
@component('mail::table')
|        |          |
| ------------- |-------------:|
| No. Order | {{str_pad($transaction->id, 10, "0", STR_PAD_LEFT)}} |
| Nama | {{ $transaction->diproses->name }} |
| Email | {{ $transaction->diproses->email }} |
@endcomponent

@component('mail::table')
| Data Transaksi |          |
| ------------- |-------------:|
| Bank Member | {{ $transaction->bank->nama->nama }} |
| E-Payment / Akun Broker Member | {{ $transaction->currency_member->nama->jenis }} |
| Kurs Beli  (Rp) | {{ $transaction->jenis_currency->beli }} |
| Diskon Rate (Rp) | {{ $transaction->jenis_currency->diskon ?? '-' }} |
| Jumlah Beli  (USD) | {{ $transaction->jenis_currency->min_trans }} |
| Total Transfer (Rp) | {{ $transaction->total }} |
@endcomponent

# Total Transfer Rp. {{ number_format($transaction->total,0,"",".") }}

##### Berita transfer wajib ditulis

Thanks,<br>
{{ config('app.name') }}
@endcomponent
