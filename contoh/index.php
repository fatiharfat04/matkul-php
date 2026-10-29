<?php
class NamaMahasiswaContoh {
    private string $nama;
    public function __construct(string $nama) {
        $nama = trim($nama);
        if ($nama === '') throw new InvalidArgumentException('Nama wajib diisi.');
        $this->nama = $nama;
    }
    public function getNama(): string { return $this->nama; }
}
$m = new NamaMahasiswaContoh(' Budi ');
echo $m->getNama();


class NilaiContoh {
    private float $nilai;

    public function __construct(float $nilai)
    {
        $this->setNilai($nilai);
    }

    public function getNilai(): float
    {
        return $this->nilai;
    }

    public function setNilai(float $nilai)
    {
        if (!is_finite($nilai) || $nilai < 0 || $nilai > 100) {
            throw new InvalidArgumentException('Nilai harus 0-100');
        }
        return $this->nilai;
    }
}

$n = new NilaiContoh(80);
try {
    $n->setNilai(120);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . '';
}
echo 'Nilai tetap: ' . $n->getNilai();



class LabelContoh {
    private string $teks;
    public function __construct(string $teks) {
        if (trim($teks) === '') throw new InvalidArgumentException('Teks wajib diisi.');
        $this->teks = trim($teks);
    }
    public static function dariArray(array $data): self {
        if (!isset($data['teks']) || !is_string($data['teks'])) {
            throw new InvalidArgumentException('Format teks tidak valid.');
        }
        return new self($data['teks']);
    }
    public function getTeks(): string { return $this->teks; }
}
echo LabelContoh::dariArray(['teks'=>'Laporan Nilai'])->getTeks();